<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\trip;
use App\User;
use App\travelagency;
use App\schedules;
use App\tripround;
use Auth;
use Response;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
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
       
        $trips = DB::table('trips')->where ( 'trips_name', 'LIKE', '%' . $q . '%' )->paginate(15);
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
            'schedules' => $schedules,
            'triprounds' => $triprounds,
            'trip' => $trip,
            'title' => 'Schedules',
            'sumbook' =>$sumbook,
            'agen' => $agen,
            'review' =>$review,
            'one' =>$one,
            'two' => $two,
            'three' =>$three,
            'four' => $four,
            'five' => $five,
            'alluser' => $alluser
            
        );
        return view('schedule', $data);
    }
    function schedules($id){
        
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
                  'agen' => $agen,
                  'diffdate' => $diffdate
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
        $data = array(
            //'user' => $user,
            'userbook' => $userbook,
            // 'tripname' => $tripname,
             ' triproundbook' => $triproundbook
            
        );
        return view('profile_user',$data);
    }

    function profileusersetting(){
    
            $userId = Auth::user()->id; 
            
            $userbook = DB::table('booking')->where('user_id',$userId)->get();
            $triproundbook = DB::table('booking')->select('tripround_id')->where('user_id',$userId)->pluck('tripround_id');
            $user = DB::table('users')->where('id',$userId)->first(); //ข้อมูล userคนนั้น 
               // dd($user);
            $data = array(
                'user' => $user,
                'userbook' => $userbook,
                 'triproundbook' => $triproundbook
                
                
            );
            return view ('profile_setting',$data);
    }
       
    public function settingto(Request $request){

        // $userId = DB::table('users')->where('id',Auth::user()->id)->first();
        if ($request->hasFile('image')) {
            $path = public_path('images');
        $imgName = 'Profileuser_'.str_random(10).$request->file('image')->getClientOriginalName();
        $request->file('image')->move($path,$imgName);
        $userId = User::find(Auth::user()->id);
        $userId->image = $imgName;
        $userId->save();
    }
        

        $userId = User::find(Auth::user()->id);

        $userId->firstname = $request->firstname;
        $userId->lastname = $request->lastname;
        //$userId->image = $imgName;
        $userId->phone = $request->phone;
        $userId->address = $request->address;
        $userId->province = $request->province;
        $userId->zipcode = $request->zipcode;
        $userId->sex = $request->sex;
        $userId->age = $request->age;
        $userId->food_allergy = $request->food_allergy;  
        $userId->chronic_disease = $request->chronic_disease;
        $userId->save();

//          $payload = $request->json()->all();
//  $id= $userId = Auth::user()->id;  
//       
        // $userId = users::find($id);
        // $userId->firstname = $request->firstname;
        // $userId->lastname = $request->lastname;
        // $userId->phone = $request->phone;
        // $userId->address = $request->address;
        // $userId->province = $request->province;
        // $userId->zipcode = $request->zipcode;
        // $userId->sex = $request->sex;
        // $userId->age = $request->age;
        // $userId->food_allergy = $request->food_allergy;
        // $userId->chronic_disease = $request->chronic_disease;
        // $userId->save();

             
             return redirect('/profileuser');
     }

     function commenttrip($id){
        
               $tripname = DB::table('trips')->where('id',$id)->first();
               $data = array(
                'tripname' => $tripname,
            );
        
                 return view('commentation',$data);
             }
        function commentstore(Request $request){

                     DB::table('reviewTrip')
                     ->insertGetId([ 
                            "rate" =>$request->input('rate'),
                            "rate_des" =>$request->input('des'),
                            "trip_id"=>$request->input('trip_id'),
                            "user_id"=>$request->input("user_id",Auth::user()->id),
                        ]);

            return redirect('/profileuser');
     }
            function profileagencysetting(){

                $userId = Auth::user()->id; 
                $agency = DB::table('travelagency')->where('user_id',$userId)->get();

                //$userbook = DB::table('booking')->where('user_id',$userId)->get();
                //$triproundbook = DB::table('booking')->select('tripround_id')->where('user_id',$userId)->pluck('tripround_id');
                $user = DB::table('users')->where('id',$userId)->first(); //ข้อมูล userคนนั้น 
                   // dd($user);
                $data = array(
                    'user' => $user,
                    'agency' => $agency,
                    //'triproundbook' => $triproundbook
                    
                    
                );
        
                 return view('profileagencysetting',$data);
             }
             function profileagencysettingstore(Request $request){

                $userId = Auth::user()->id; 
                $agency = DB::table('travelagency')->select('id')->where('user_id',$userId)->pluck('id')->first();  

                if ($request->hasFile('image')) {
                    $path = public_path('images');
                    $imgName = 'Profileagency_'.str_random(10).$request->file('image')->getClientOriginalName();
                    $request->file('image')->move($path,$imgName);
                    $userId = User::find(Auth::user()->id);
                    $userId->image = $imgName;
                    $userId->save();
            }
                

                $agencysetting = travelagency::find($agency);
        
                $agencysetting->agency_iata_no = $request->agency_iata_no;
                $agencysetting->agency_tax_id = $request->agency_tax_id;
                $agencysetting->agency_address = $request->agency_address;
                $agencysetting->agency_province = $request->agency_province;
                $agencysetting->agency_zipcode = $request->agency_zipcode;
                $agencysetting->agency_tel1 = $request->agency_tel1;
                $agencysetting->agency_tel2 = $request->agency_tel2;
                $agencysetting->agency_fax = $request->agency_fax;  
                $agencysetting->agency_web = $request->agency_web;
                $agencysetting->agency_fb = $request->agency_fb;
                $agencysetting->agency_description = $request->agency_description;
                $agencysetting->save();
                
                               
                        
                                 return redirect('/agency');
                             }

}
