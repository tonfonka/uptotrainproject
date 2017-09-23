<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller; 
use Auth;
use Response;
use App\ImageGallery;
use Illuminate\Http\UploadedFile;

class tripAgencyController extends Controller
{
    function index() {

        if(Auth::user()->role != "travel agency"){
            return Response::json([
                'statusCode'=> 401,
                'statusMessage' => 'Autherization Failed'
            ]);
        }

        $userId = Auth::user()->id;
        $agen = DB::table('travelagency')->select('id')->where('user_id',$userId)->get();

        return view('addTrip');

    //     $trips = DB::table('trips')
    //     ->join('triprounds','trips.id','=','triprounds.trip_id')
    //     ->join('stations','stations.id','=','trips.source_id')
    //    // ->join('stations','stations.id','=','trips.destination_id')
    //     ->join('travelagency','travelagency.id','=','trips.travelagency_id')
    //     ->orderBy('trips.id','DESC')
    //     ->get();
        
    //     return view('trip_travelAgency', ['trips' => $trips]);

    }
    public function tripstore(Request $request)
    {
        $userId = Auth::user()->id;
        $agen = DB::table('travelagency')->select('id')->where('user_id',$userId)->pluck('id');
       // dd($agen);
      
       $a = Array();
       for($i=0;$i<sizeOf($agen);$i++){
           $data = array($agen[$i]);
           array_push($a, $data);
       }
       foreach($a as $rs) {
        DB::table('trips')
            ->insertGetId([
                "trips_name" => $request->input('trips_name'),
                "trip_nday" => $request->input('trip_nday'),
                "trip_nnight" => $request->input('trip_nnight'),
                "trip_province" => $request->input('trip_province'),
                "trip_meal" =>$request->input('trip_meal'),
                "trip_description" => $request->input('trip_description'),
                //"image" =>$request->input('image'),
            //    $input['image'] = time().'.'.$request->image->getClientOriginalExtension(),
               // 
               
               //$request->image->move(public_path('images')),
                "travelagency_id" => $rs[0],
                "source_id"=>$request->input("source_id", '1'),
                "destination_id"=>$request->input("source_id", '1')
            ]);
    }
               
    
      $tripId = DB::table('trips')->where('trips_name', $request->input('trips_name'))->first()->id;
      $tripID = DB::table('trips')->where('trips_name', $request->input('trips_name'))->first();
    
   
    
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
            return view('/imagegallery',['tripID'=>$tripID->id]);
    
    }
    public function imageindex()
    {
      //$images = DB::table('imagegallery')->get();
        $images = ImageGallery::get();
       // dd($images);
    	return view('/imagegallery',$images);
    }

    /**
     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */
    public function imageupload(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);

        $input['title'] = $request->title;
        $input['trip_id'] =$request->trip_id;
        ImageGallery::create($input);
        return redirect('/agency');
    	// return back()
    	// 	->with('success','Image Uploaded successfully.');
    }

    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function imagedestroy($id)
    {
    	ImageGallery::find($id)->delete();
    	return back()
    		->with('success','Image removed successfully.');	
    }
    
}
