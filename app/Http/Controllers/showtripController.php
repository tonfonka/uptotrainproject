<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller; 
use DB;
use Illuminate\Http\Request;
use App\tripround;
use App\schedule;
use App\trip;
class showtripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $trips = DB::table('trips')->get();
        $tripround =DB::table('triprounds')->join('trips','trips.id','=','triprounds.trip_id')->get();
        $travelagency =DB::table('travelagency')->get();
        $data=array(
            'trips' =>$trips,
            'travelagency'=>$travelagency,
            'tripround' =>$tripround
            
        );
        return view('TravelAgency_home',$data);
      //  return view('TravelAgency_home',['data'=> $trips]);
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
     DB::table('trips')
       ->insertGetId([ 
           "trips_name" => $request->input('trips_name'),
           "trip_nday" => $request->input('trip_nday'),
           "trip_nnight" => $request->input('trip_nnight'),
           "trip_province" => $request->input('trip_province'),
           "trip_meal" =>$request->input('trip_meal'),
           "trip_description" => $request->input('trip_description'),
           "travelagency_id"=> $request->input( "travelagency_id", '1'),
           "source_id"=>$request->input("source_id", '1'),
           "destination_id"=>$request->input("source_id", '1')
           ]);
      $tripId = DB::table('trips')->where('trips_name', $request->input('trips_name'))->first()->id;
    
   
    
      //$tripId = DB::table('trips')->select('id')->where('trips_name', $request->input('trips_name'))->first();
        // return view('add_TripRound', ['tripId'=> $tripId->id]);
    $startDate = $request->input('start_date');
    $departureDate = $request->input('departure_date');
    $priceChild = $request->input('price_child');
    $priceAdult = $request->input('price_adult');
    $amountSeat = $request->input('amount_seats');

    $rounds = Array();
    for($i=0;$i<sizeOf($startDate);$i++){
        $data = array($startDate[$i], $departureDate[$i], $priceChild[$i], $priceAdult[$i], $amountSeat[$i]);
        array_push($rounds, $data);
    }

    // dd($rounds);
    foreach($rounds as $rs) {
        DB::table('triprounds')
            ->insertGetId([
                "start_date" => $rs[0],
                "departure_date" => $rs[1],
                "price_child" => $rs[2],
                "price_adult" => $rs[3],
                "amount_seats" => $rs[4],
                "triprounds_description" => $request->input('description'),
                "trip_id" => $tripId
            ]);
    }
        $schedule_day =$request->input('schedule_day');
        $schedule_time =$request->input('schedule_time');
        $schedule_place =$request->input('schedule_place');
        $schedule_description=$request->input('schedule_description');
      
     $schedule =Array();
      
    for($i=0;$i<sizeOf($schedule_day);$i++){
        $data = array($schedule_day[$i],  $schedule_time[$i], $schedule_place[$i],$schedule_description[$i]);
        array_push($schedule, $data);
     }
    $i=1;
  //$i=count($schedule_day);
 // dd($i);
        foreach($schedule as $sd){
            if ($i <= count($schedule_day)){
                    DB::table('schedules')
                    ->insertGetId([
                    "schedule_day" =>$sd[0],
                    "schedule_time" =>$sd[1],
                    "schedule_place" =>$sd[2],
                    "schedule_description" =>$sd[3],
                    "trip_id" =>$tripId
                    ]);
                } 

   }
            return redirect('/agency');
    
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
        return view('', ["data" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$objs = Trips::find($id);
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
            "trip_name" => $request->input('trips_name'),
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
       DB::table('trips')->where('id', '=', $id)->delete();
    }

    public function search()
{
    $search = \Request::get('search'); //<-- we use global request to get the param of URI

    $offices = Office::where('name','like','%'.$search.'%')
        ->orderBy('name')
        ->paginate(20);

    return view('offices.index',compact('offices'));
}
}