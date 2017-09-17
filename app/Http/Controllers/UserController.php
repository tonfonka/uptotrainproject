<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\trip;
use App\schedules;
use App\tripround;
use Auth;
use Response;
use Illuminate\Support\Facades\Input;
class UserController extends Controller
{
    function __construct(){
        
    }
    function index() {
        return view('index');
    }

    function search(){
         $trips = Trip::paginate(15);
         
        return view('tripuser',['trips'=>$trips]);
    }


    function schedule($id){
  
        $schedules = schedules::where('trip_id',$id)->get();
        $triprounds = tripround::where('trip_id',$id)->get();
        $booking =DB::table('booking')->where('tripround_id',$id)->get();
        $sumbook = $booking->sum('number_booking');
        $trip = trip::where('id',$id)->first();
        $data = array(
            'schedules' => $schedules,
            'triprounds' => $triprounds,
            'trip' => $trip,
            'title' => 'Schedules',
            'sumbook' =>$sumbook
        );
        return view('schedule', $data);
    }

    function booking($id){
        if(Auth::user()->role != "user"){
            return Response::json([
                'statusCode'=> 401,
                'statusMessage' => 'Autherization Failed'
            ]);
        }

        $fk = DB::table('triprounds')->select('trip_id')->where('id',$id)->pluck('trip_id');
        $booking =DB::table('booking')->where('tripround_id',$id)->get();
        $sb = DB::table('booking')->select('number_booking')->where('tripround_id',$id)->pluck('number_booking');
        $count = $booking->count();
        $sumbook = 0;
        foreach($booking as $book){
            if($book->status != "pending"){
                $sumbook += $book->number_booking;
            }
        }
        // $sumbook = $booking->sum('number_booking');
        //dd($sumbook);
        $trip = DB::table('trips')->where('id',$fk)->get();
        $triprounds = tripround::where('id',$id)->first();
        $data = array(
            'triprounds' => $triprounds,
            'trip' => $trip,
            'booking' => $booking,
            'count' => $count,
            'sumbook' => $sumbook
        );
        return view('booking', $data);
    }

    function login(){
        return view('login');
    }

    
    function register(){
        return view('register');
    }
    function res()
    {
        $userId = Auth::user()->id;
        
        return view('regis_agency',['userId'=> $userId]);
    }
    function regisagency(Request $request){
        DB::table('travelagency')
        ->insertGetId([ 
            "agency_name_th" => $request->input('agency_name_th'),
            "agency_name_en" => $request->input('agency_name_en'),
            "agency_license" => $request->input('agency_license'),
            "agency_iata_no" => $request->input('agency_iata_no'),
            "agency_tax_id" =>$request->input('agency_tax_id'),
            "agency_address" => $request->input('agency_address'),
            "agency_province"=> $request->input("agency_province"),
            "agency_zipcode"=>$request->input("agency_zipcode"),
            "agency_tel1"=>$request->input("agency_tel1"),
            "agency_tel2"=>$request->input("agency_tel2"),
            "agency_fax"=>$request->input("agency_fax"),
            "agency_email"=>$request->input("agency_email"),
            "agency_web"=>$request->input("agency_web"),
            "agency_fb"=>$request->input("agency_fb"),
            "agency_description"=>$request->input("agency_description"),
            "user_id"=>$request->input('user_id')
            ]);
            return redirect('/agency');
    }
}
