<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class comptelttripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trip_travelagency');
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
        DB::table('triprounds')
        ->insertGetId([ 
          "start_date" => $request->input('start_date'),
               "departure_date" =>$request->input('departure_date'),
               "price_child" =>$request->input('price_child'),
               "price_adult" =>$request->input('price_adult'),
               "amount_seats" =>$request->input('amount_seats'),
               "triprounds_description" =>$request->input('triprounds_description'),
               "trip_id" =>$request->input('trip_id')
            ]);
            DB::table('schedules')
            ->insertGetId([
               "schedule_day" =>$request->input('schedule_day'),
               "schedule_time" =>$request->input('schedule_time'),
               "schedule_place" =>$request->input('schedule_place'),
               "schedule_description" =>$request->input('schedule_description'),
               "trip_id" =>$request->input('trip_id')
            ]);
            return view('trip_travelAgency');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
