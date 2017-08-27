<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\trip;
use DB;


class addtripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('addTrip');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('addTrip');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         DB::table('trips')
        ->insertGetId([ 
           "trips_name" => $request->input('trips_name'),
           "trip_nday" => $request->input('trip_nday'),
           "trip_nnight" => $request->input('trip_nnight'),
           "trip_province" => $request->input('trip_province'),
           "trip_meal" =>$request->input('trip_meal'),
           "trip_description" => $request->input('trip_description'),
           "travelagency_id"=> $request->input( "travelagency_id",'1'),
           "source_id"=>$request->input("source_id",'1'),
           "destination_id"=>$request->input( "source_id",'1')
           ]);
        $data = DB::table('trips')->where('trips_name')->select('id')->first();
           return view('add_TripRound',  ['tripId' => $data]);

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
        return view('addTrip', ["data" => $data]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj=trip::find($id);
       
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
        //  DB::table('trips')
        //     ->where('id', $id)
        //     ->update([
        //     "trips_name" => $request->input('trips_name'),
        //     "trip_nday" => $request->input('trip_nday'),
        //     "trip_nnight" => $request->input('trip_nnight'),
        //     "trip_province" => $request->input('trip_province'),
        //     "trip_meal" =>$request->input('trip_meal'),
        //     "trip_description" => $request->input('trip_description')
        //     ]);
        //     DB::table('triprounds')
        //     ->where('id',$id)
        //     ->update([
        //        "start_date" => $request->input('start_date'),
        //         "departure_date" =>$request->input('departure_date'),
        //         "price_child" =>$request->input('price_child'),
        //         "price_adult" =>$request->input('price_adult'),
        //         "amount_seats" =>$request->input('amount_seats'),
        //         "triprounds_description" =>$request->input('triprounds_description')
        //     ]);

        DB::table('trips')
        ->where('id',$id)
        ->update([
            "trips_name" => $request->input('trips_name'),
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
        //$obj3 = Trips::find(2);
       // $obj3->delete();
    }
}
