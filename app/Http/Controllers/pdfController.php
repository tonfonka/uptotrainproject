<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\trip;
use App\User;
use App\travelagency;
use App\schedules;
use App\tripround;
use Auth;
use Response;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use PDF;

class pdfController extends Controller
{
    function  bookingsumpdf($id){
       $booking = DB::table('booking')->get();
            $mbook =$booking->max('id');
            $book = DB::table('booking')->where('id',$id)->first();
            $nu = DB::table('booking')->select('tripround_id')->where('id',$id)->pluck('tripround_id');
            $u= DB::table('booking')->select('user_id')->where('id',$id)->pluck('user_id');
            $triprounds = DB::table('triprounds')->where('id',$nu)->get();
            $tr = DB::table('triprounds')->select('trip_id')->where('id',$nu)->pluck('trip_id');

            $user = DB::table('users')->where('id',$u)->get();
            $trip = DB::table('trips')->where('id',$tr)->get();
           
            $pdf =PDF::loadView('bookingsumpdf',compact('mbook','book','nu','u','triprounds','tr','user','trip'));
            return $pdf->stream('bookingsum.pdf');
            }     
    function  schedulepdf($id){
        $schedule = DB::table('schedules')->where('trip_id',$id)->get();
        $trip = DB::table('trips')->where('id',$id)->first();
                    
        $pdf =PDF::loadView('schedulepdf',compact('schedule','trip'));
        return $pdf->stream('schedule.pdf');
    }     

}
