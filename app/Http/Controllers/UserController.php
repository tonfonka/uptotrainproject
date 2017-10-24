<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\trip;
use App\schedules;
use App\tripround;
use Auth;
use Response;
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

    function searchResult(){
        $q = Input::get ( 'q' );
       
        $trips = DB::table('trips')
        ->where ( 'trips_name', 'LIKE', '%' . $q . '%' )->paginate(15);
        if (count ( $trips ) > 0)
            return view ( 'tripuser_resultsearch' )->withDetails ( $trips )->withQuery ( $q );
        else
            return view ( 'tripuser_resultsearch' )->withMessage ( 'No Details found. Try to search again !' );
   }


    function schedule($id){
  
        $schedules = schedules::where('trip_id',$id)->get();
        $triprounds = tripround::where('trip_id',$id)->get();
        
        $booking =DB::table('booking')->where('tripround_id',$id)->get();
        $sumbook = $booking->sum('number_booking');
        $n =DB::table('trips')->select('travelagency_id')->where('id',$id)->pluck('travelagency_id');
        $agen = DB::table('travelagency')->where('id',$n)->get();
        $trip = trip::where('id',$id)->first();
        $data = array(
            'schedules' => $schedules,
            'triprounds' => $triprounds,
            'trip' => $trip,
            'title' => 'Schedules',
            'sumbook' =>$sumbook,
            'agen' => $agen
            
        );
        return view('schedule', $data);
    }
    function schedules($id){
        
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
              return view('schedule_tonfon', $data);
          }

    function booking($id){
        if(Auth::user()->role != "user"){
            return redirect('/hello');
        }

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
    function res()
    {
        $userId = Auth::user()->id;
        
        return view('regis_agency',['userId'=> $userId]);
    }
    function regisagency(Request $request){
        DB::table('travelagency')
        ->insertGetId([ 
            "agency_name_th" => $request->input('agency_name_th'),
            "agency_name_en" => $request->input('agency_name_en'),
            "agency_license" => $request->input('agency_license'),
            "agency_iata_no" => $request->input('agency_iata_no'),
            "agency_tax_id" =>$request->input('agency_tax_id'),
            "agency_address" => $request->input('agency_address'),
            "agency_province"=> $request->input("agency_province"),
            "agency_zipcode"=>$request->input("agency_zipcode"),
            "agency_tel1"=>$request->input("agency_tel1"),
            "agency_tel2"=>$request->input("agency_tel2"),
            "agency_fax"=>$request->input("agency_fax"),
            "agency_email"=>$request->input("agency_email"),
            "agency_web"=>$request->input("agency_web"),
            "agency_fb"=>$request->input("agency_fb"),
            "agency_description"=>$request->input("agency_description"),
            "user_id"=>$request->input('user_id')
            ]);
            return redirect('/agency');
    }
    function profileuser(){
        if(Auth::user()->role != "user"){
            return redirect('/hello');
        }

        $userId = Auth::user()->id; 
        //dd($userId);
        $userbook = DB::table('booking')->where('user_id',$userId)->get();
        $triproundbook = DB::table('booking')->select('tripround_id')->where('user_id',$userId)->pluck('tripround_id');
        $user = DB::table('users')->where('id',$userId)->first(); //ข้อมูล userคนนั้น 
            // $tripname = DB::table('trips')
            // ->join('triprounds','trips.id','=','triprounds.trip_id')
            // ->where('triprounds.id',$triproundbook[1])
            // ->get();
        
        
       //ข้อมูลการจอง
       // 
        // dd($tripname);
         
        // $tripbooking = DB::table('triprounds')->where('id',$userbook)->get();//รอบที่จอง
        // $tripbookings = DB::table('triprounds')->select('trip_id')->where('id',$triproundbook)->pluck('trip_id');
        // $tripname = DB::table('trips')->where('id',$tripbookings)->get();//ทริปที่จอง
        //dd($tripname);
        //dd($user);
        //dd($userbook);
        $data = array(
            //'user' => $user,
            'userbook' => $userbook,
            // 'tripname' => $tripname,
             ' triproundbook' => $triproundbook
            
        );
        return view('profile_user',$data);
    }
    //function profileusersetting(Request $request,$id){
        function profileusersetting(){
            if(Auth::user()->role != "user"){
                return redirect('/hello');
            }
    
            $userId = Auth::user()->id; 
            
            $userbook = DB::table('booking')->where('user_id',$userId)->get();
            $triproundbook = DB::table('booking')->select('tripround_id')->where('user_id',$userId)->pluck('tripround_id');
            $user = DB::table('users')->where('id',$userId)->first(); //ข้อมูล userคนนั้น 
               // dd($user);
            $data = array(
                'user' => $user,
                'userbook' => $userbook,
                
                 ' triproundbook' => $triproundbook
                
                
            );
            return view ('profile_setting');
    }
}
