<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use Illuminate\Http\Request;
use Response;
use App\tripround;
use App\schedule;
use App\trip;
use App\booking;
use App\travelagency;
use Auth;
use Illuminate\support\Str;
use Mail;
use App\Mail\verifyEmail;
use Session;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/checkregis';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role'=>'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Session::flash('status','Registered! but verify your email to activate your account');
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => bcrypt($data['password']),
            'verifyToken' => Str::random(40),
        ]);
       // $userId = DB::table('users')->where('role', $data['role'])->first();
        //return view('regis_agen', ['userId'=> $userId->id]);
        $thisUser = User::findOrFail($user->id);
        $this->sendEmail($thisUser);
        return $user;
    }

    function regisAgency(Request $request)
    {
        $agency =  DB::table('travelagency')
        ->insertGetId([ 
            "trip_name" => $request->input('trip_name'),
            "trip_nday" => $request->input('trip_nday'),
            "trip_nnight" => $request->input('trip_nnight'),
            "trip_province" => $request->input('trip_province'),
            "trip_meal" =>$request->input('trip_meal'),
            "trip_description" => $request->input('trip_description')
            ]);
             return view('add_tripround', ['trips' => $trips]);
    }

    

    public function sendEmail($thisUser){
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function verifyEmailFirst(){
        return view('email.verifyEmailFirst');
    }
    
    function index()
    {
        $userId = Auth::user()->id;
        dd($userId);
        return view('regis_agency',['userId'=> $userId]);
    }

    public function sendEmailDone($email,$verifyToken){
        $user = User::where(['email'=>$email,'verifyToken'=>$verifyToken])->first();
        if($user){
            return user::where(['email'=>$email,'verifyToken'=>$verifyToken])->update(['status'=>1,'verifyToken'=>NULL]);
        }else{
            return 'user not found';
        }
    }
}
