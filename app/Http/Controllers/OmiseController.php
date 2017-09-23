<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Response;
use App\trip;
use App\schedules;
use App\booking;
use Auth;
use App\Payment;
use App\Http\Controllers\Omise\lib\Omise;
require_once dirname(__FILE__).'/omise/lib/Omise.php';
define('OMISE_PUBLIC_KEY', 'pkey_test_58x5lew98sd34rjio0a');
define('OMISE_SECRET_KEY', 'skey_test_58x5lew9hbhyqdjgf7j');
class OmiseController extends Controller
{
    function index() {
        return view('index');
    }
    function search(){
        $trips = DB::table('trips')
        ->orderBy('id', 'desc')
        ->get();
        return view('tripuser',['trips'=>$trips]);
    }
    
    function schedule($id){
        
        $schedules = schedules::where('trip_id',$id)->get();
        $data = array(
            'schedules' => $schedules,
            'title' => 'Schedules'
        );
        return view('schedule', $data);
    }
    
    function login(){
        return view('login');
    }
    
    function register(){
        return view('register');
    }
    function checkout(Request $request){
        $name = $request->input('name');
        $amount = $request->input('amount');
        $booking_id = $request->input('booking_id');
        $charge = \OmiseCharge::create(array(
            'amount' => $amount,
            'currency' => 'thb',
            'card' => $_POST['omiseToken'],
            'metadata' => ['name' => $name, 'booking_id' => $booking_id]
          ));
          echo '<pre>';
          print_r($_POST);
          echo '</pre>';
          
          echo '<hr>';
          
          echo '<pre>';
          print_r($charge);
          echo '</pre>';
     }
     function charge(Request $request){
        $data = $request->json()->all();
        $amount = $data['amount'];
        $name = $data['name'];
        $sname = $data['sname'];
        $tel = $data['tel'];
        $bank = $data['bank'];
        $charge = \OmiseCharge::create(array(
            'amount' => $amount,
            'currency' => 'thb',
            'offsite' => $bank,
          //  'return_uri' => 'http://animal-aid.me/all',
              'return_uri' => 'http://localhost:8000/all',
            'metadata' => ['name' => $name, 'sname' => $sname, 'tel' => $tel]
          ));
        return Response::json([
            'statusCode' => 200,
            'url' => $charge['authorize_uri']
            ], 200);
    }
    function webhook(Request $request){
        $payload = $request->json()->all();
        if($payload['key'] === 'charge.create'){ //event credit charge
            $amount = $payload['data']['amount'];
            $status = $payload['data']['paid'];
            $name = $payload['data']['metadata']['name'];
            $booking_id = $payload['data']['metadata']['booking_id'];
        }
        $payment = new Payment;
        $payment->name = $name;
        $payment->amount = $amount;
        $payment->status = $status;
        $payment->save();
        $myBook = booking::find($booking_id);
        $myBook->status = 'success';
        $myBook->save();
        return Response::json([
            'statusCode' => 200,
            'statusMessage' => 'success add record',
            'data' => $payment
        ], 200);
    }
    public function bookingstore(Request $request)
    {
        DB::table('booking')
        ->insertGetId([ 
                "number_adults" =>$request->input('number_adults'),
                "number_children" => $request->input('number_children'),
                "number_booking" =>$request->input('number_booking'),
                "total_cost"=>$request->input('total_cost'),
                "tripround_id"=>$request->input('book_id'),
                "user_id"=>$request->input("user_id",Auth::user()->id),
                "status"=>"pending"
            ]);
            return redirect('/bookingsum');
    }
    public function bookingsum()
    {
        $booking = DB::table('booking')->get();
        $mbook =$booking->max('id');
        $book = DB::table('booking')->where('id',$mbook)->first();
        $nu = DB::table('booking')->select('tripround_id')->where('id',$mbook)->pluck('tripround_id');
        $u= DB::table('booking')->select('user_id')->where('id',$mbook)->pluck('user_id');
        $triprounds = DB::table('triprounds')->where('id',$nu)->get();
        $tr = DB::table('triprounds')->select('trip_id')->where('id',$nu)->pluck('trip_id');
        $user = DB::table('users')->where('id',$u)->get();
        $trip = DB::table('trips')->where('id',$tr)->get();
        $data = array(
            'booking' => $booking,
            'mbook' =>$mbook,
            'book' =>$book,
            'tripround' =>$triprounds,
            'user' => $user,
            'trip'=>$trip
        );
        return view('bookingsum', $data);
    }
    
    
    
}