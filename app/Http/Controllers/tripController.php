<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class tripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = DB::table('trips')
        ->join('triprounds','trips.id','=','triprounds.trip_id')
        ->join('stations','stations.id','=','trips.source_id')
       // ->join('stations','stations.id','=','trips.destination_id')
        ->join('travelagency','travelagency.id','=','trips.travelagency_id')
        ->orderBy('triprounds.start_date','asc')
        ->get();

        return view('TravelAgency_home', ['trips' => $trips]);
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trips =  DB::table('trips')
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('trips')
            ->where('id', $id)
            ->get();
        return view('TravelAgency_home', ["data" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('trips')
            ->where('id', $id)
            ->update([
                 "trip_name" => $request->input('trip_name'),
            "trip_nday" => $request->input('trip_nday'),
            "trip_nnight" => $request->input('trip_nnight'),
            "trip_province" => $request->input('trip_province'),
            "trip_meal" =>$request->input('trip_meal'),
            "trip_description" => $request->input('trip_description')
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
