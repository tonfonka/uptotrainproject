<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Response;
use App\tripround;
use App\schedule;
use App\trip;
use App\booking;
use App\travelagency;
use Auth;

class mapController extends Controller
{
    function station(){
        $stations = DB::table('stations')->get();
        return view('map',['stations'=> $stations]);
    }

    function getLAT(){
        $s = Input::post('station');
        $data = array(
            's' => $s
        );
        return view('map',$data);
    }

    
}
