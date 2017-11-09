<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller; 
use DB;
use Illuminate\Http\Request;
use Request as _Request;
use Storage;
use Response;
use App\tripround;
use App\schedule;
use App\trip;
use App\booking;
use App\travelagency;
use Auth;
use App\ImageGallery;
use Illuminate\Http\UploadedFile;
use Hash;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Data;
use PDF;
use Yajra\Datatables\Facades\Datatables;





class tripAgencyController extends Controller
{
    function index() {

        if(Auth::user()->role != "travel agency"){
            return redirect('/hello');
        }

        $travelagencies = travelagency::where('user_id', Auth::user()->id)->first();
        
        $data=array(
            'travelagencies' => $travelagencies
        );

        return view('addTrip',$data);

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
        //dd($request); //FUCKYOU
        $userId = Auth::user()->id;
        $agen = DB::table('travelagency')->select('id')->where('user_id',$userId)->pluck('id');
       // dd($agen);
      
       $a = Array();
       for($i=0;$i<sizeOf($agen);$i++){
           $data = array($agen[$i]);
           array_push($a, $data);
       }
       //dd($request->input('image'));
       $path = public_path('images');
       $imgName = 'TRIP_'.str_random(10).$request->file('image')->getClientOriginalName();
       $request->file('image')->move($path,$imgName);
      
       foreach($a as $rs) {
        DB::table('trips')
            ->insertGetId([
                "trips_name" => $request->input('trips_name'),
                "trip_nday" => $request->input('trip_nday'),
                "trip_nnight" => $request->input('trip_nnight'),
                "trip_province" => $request->input('trip_province'),
                "trip_meal" =>$request->input('trip_meal'),
                "trip_description" => $request->input('trip_description'),

               "image" =>$imgName,
                //"image" =>$request->file('image')->getPathName(),

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
   // $i=1;

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

   function showdetailtrip($id) {
            if(Auth::user()->role != "travel agency"){
                return redirect('/hello');
            }
            $userId = Auth::user()->id;
            //$agen = DB::table('travelagency')->select('id')->where('user_id',$userId)->get();
            //$travelagencies = travelagency::where([['user_id', Auth::user()->id],['trips.id',$id]])->first();
            $travelagencies =  DB::table('travelagency')->where('user_id', Auth::user()->id)->first();
            //$trip = DB::table('trips')->where([['id',$id],['travelagency_id', Auth::user()->id]])->get();
            $trips = DB::table('trips')->where('id',$id)->get();
            $tripround = DB::table('triprounds')->where('trip_id',$id)->get();
            //dd($trips);
                    $data = array(
                        'travelagencies' => $travelagencies,
                        'trips' => $trips,
                        'tripround' => $tripround
                    );
    
        return redirect('/agency');

    }

    
    function shownumber($id) {
        if(Auth::user()->role != "travel agency"){
            return redirect('/hello');
        }
        $userId = Auth::user()->id;
         $travelagencies =  DB::table('travelagency')->where('user_id', Auth::user()->id)->first();
        // $trips = DB::table('trips')->where('id',$id)->get();
        // $tripround = DB::table('triprounds')->where('trip_id',$id)->get();
        
        
        $round = DB::table('triprounds')->select('trip_id')->where('id',$id)->pluck('trip_id');
        $trips = DB::table('trips')->where('id',$round)->get();
        //dd($trips);
        $booking = DB::table('booking')->where('tripround_id',$id)->orderBy('id','desc')->get();
        
        $book = DB::table('booking')->select('user_id')->where('tripround_id',$id)->pluck('user_id');
        $count = $book->count();
        $totalNum = DB::table('booking')->where([['tripround_id',$id],['status','=','success']])->sum('number_booking');
        //([['tripround_id',$id],['status','=','success']])
        $totalChild = DB::table('booking')->where([['tripround_id',$id],['status','=','success']])->sum('number_children');
        $totalAdult = DB::table('booking')->where([['tripround_id',$id],['status','=','success']])->sum('number_adults');
        $totalMoney = DB::table('booking')->where([['tripround_id',$id],['status','=','success']])->sum('total_cost');
        $tripround = DB::table('triprounds')->where('id',$id)->first();
        $username =DB::table('users')->where('id',$book)->get();

                $data = array(
                    'travelagencies' => $travelagencies,
                    'booking' => $booking,
                    'book' => $book,
                    'username' => $username,
                    'trips' => $trips,
                    'round'=>$round,
                    'tripround' => $tripround,
                    'count' =>$count,
                    'totalNum' =>$totalNum,
                    'totalChild' => $totalChild,
                    'totalAdult' => $totalAdult,
                    'totalMoney' => $totalMoney

                );

    return view('agency_tripmember',$data);

}




    public function imageindex()
    {
      
        $images = ImageGallery::get();
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
        // $tripd = $request->input('trip_id');
        // $ima =   $input['image'];
       // dd($ima);
        // $myTrip = trip::find($input['trip_id']);
        // $myTrip->image = $request->image;
        // $myTrip->save();
        // $myTrip = trip::find($tripd);
        // $myTrip->image = $input['image'];
        // $myTrip->save();
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

    function showAgencyDetail($id) {
       
        //$agen = DB::table('travelagency')->select('id')->where('user_id',$userId)->get();
        //$travelagencies = travelagency::where([['user_id', Auth::user()->id],['trips.id',$id]])->first();
        $travelagencies =  DB::table('travelagency')->where('id',$id )->first();
        $trips = DB::table('trips')->where('travelagency_id',$id)->get();
        //$trip = DB::table('trips')->where([['id',$id],['travelagency_id', Auth::user()->id]])->get();
        //$trips = DB::table('trips')->where('id',$id)->get();
        //$tripround = DB::table('triprounds')->where('trip_id',$id)->get();
        //dd($trips);
        $review = DB::table('reviewTrip')->where('trip_id',$id)->get();
        $alluser = $review->count();
        $re = DB::table('reviewTrip')->select('user_id')->where('trip_id',$id)->pluck('user_id');
        $trip = trip::where('id',$id)->first();
        $starone =  DB::table('reviewTrip')->where([['trip_id',$id],['rate','=','1']])->get();
        $one = $starone->count();
        $startwo =  DB::table('reviewTrip')->where([['trip_id',$id],['rate','=','2']])->get();
        $two = $startwo->count();
        $starthree =  DB::table('reviewTrip')->where([['trip_id',$id],['rate','=','3']])->get();
        $three = $starthree->count();
        $starfour =  DB::table('reviewTrip')->where([['trip_id',$id],['rate','=','4']])->get();
        $four = $starfour->count();
        $starfive =  DB::table('reviewTrip')->where([['trip_id',$id],['rate','=','5']])->get();
        $five = $starfive->count();
                $data = array(
                    'travelagencies' => $travelagencies,
                    'trips' => $trips,
                    //'tripround' => $tripround
                    'review' =>$review,
                    'one' =>$one,
                    'two' => $two,
                    'three' =>$three,
                    'four' => $four,
                    'five' => $five,
                    'alluser' => $alluser
                );
    return view('profileagency',$data);

}
function showUserDetail($id) {
    
     //$agen = DB::table('travelagency')->select('id')->where('user_id',$userId)->get();
     $travelagencies = travelagency::where('user_id', Auth::user()->id)->first();
     $user =  DB::table('users')->where('id',$id )->get();
     //$trips = DB::table('trips')->where('travelagency_id',$id)->get();
     //$trip = DB::table('trips')->where([['id',$id],['travelagency_id', Auth::user()->id]])->get();
     //$trips = DB::table('trips')->where('id',$id)->get();
     //$tripround = DB::table('triprounds')->where('trip_id',$id)->get();
     //dd($trips);
             $data = array(
                 'travelagencies' => $travelagencies,
                 'user' => $user,
                 //'tripround' => $tripround
             );
    return view('profileuser.agency_userinfo',$data);
}
function myprofile($id) {
    
     
    return view('profileuser.userside');

}

}

