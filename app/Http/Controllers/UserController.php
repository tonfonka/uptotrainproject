<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\trip;
use App\schedules;
use App\tripround;
use Auth;
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
}
