<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class tripAgencyController extends Controller
{
    function index() {

        $trips = DB::table('trips')
        ->join('triprounds','trips.id','=','triprounds.trip_id')
        ->join('stations','stations.id','=','trips.source_id')
       // ->join('stations','stations.id','=','trips.destination_id')
        ->join('travelagency','travelagency.id','=','trips.travelagency_id')
        ->orderBy('trips.id','DESC')
        ->get();
        
        return view('trip_travelAgency', ['trips' => $trips]);

    }
    
}
