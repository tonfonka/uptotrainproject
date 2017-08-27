<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Response;
use App\trip;
use App\schedules;
use App\Payment;
use App\Http\Controllers\Omise\lib\Omise;
require_once dirname(__FILE__).'/omise/lib/Omise.php';
define('OMISE_PUBLIC_KEY', 'pkey_test_58x5lew98sd34rjio0a');
define('OMISE_SECRET_KEY', 'skey_test_58x5lew9hbhyqdjgf7j');
class OmiseController extends Controller
{
    function index() {
        return view('index');
    }
    function search(){
        $trips = DB::table('trips')
        ->orderBy('id', 'desc')
        ->get();
   
        // ->join('triprounds','triprounds.trip_id','=','trips.id')
        // ->join('travelagency','travelagency.id','=','trips.travelagency_id')
        // ->join('stations',function ($join){
        //     $join->on('trips.source_id','=','stations.id')
        //     ->orOn('trips.destination_id','=','stations.id'); 
        // })
        // $trips->distinct('trips_name');
        //->selete(DB::)
        //รัก
        //$trip as $trip
        
        // ->get();
        //se
        return view('tripuser',['trips'=>$trips]);
    }
    
    function schedule($id){
        //$tripr = DB::table('triprounds')-get();
        //return view("schedule",['tripr'=>$tripr]);
        //return view('schedule');
        $schedules = schedules::where('trip_id',$id)->get();
        $data = array(
            'schedules' => $schedules,
            'title' => 'Schedules'
        );
        return view('schedule', $data);
    }
    
    function login(){
        return view('login');
    }
    
    function register(){
        return view('register');
    }
    function checkout(Request $request){
        $name = $request->input('name');
        $charge = \OmiseCharge::create(array(
            'amount' => 320000,
            'currency' => 'thb',
            'card' => $_POST['omiseToken'],
            'metadata' => ['name' => $name]
          ));
          echo '<pre>';
          print_r($_POST);
          echo '</pre>';
          
          echo '<hr>';
          
          echo '<pre>';
          print_r($charge);
          echo '</pre>';
     }
     function charge(Request $request){
        $data = $request->json()->all();
        $amount = $data['amount'];
        $name = $data['name'];
        $sname = $data['sname'];
        $tel = $data['tel'];
        $bank = $data['bank'];
        $charge = \OmiseCharge::create(array(
            'amount' => $amount,
            'currency' => 'thb',
            'offsite' => $bank,
            'metadata' => ['name' => $name, 'sname' => $sname, 'tel' => $tel]
          ));
        return Response::json([
            'statusCode' => 200,
            'url' => $charge['authorize_uri']
            ], 200);
    }
     function webhook(Request $request){
        $payload = $request->json()->all();
        if($payload['key'] === 'charge.create'){ //event credit charge
            $amount = $payload['data']['amount'];
            $status = $payload['data']['paid'];
            $name = $payload['data']['metadata']['name'];
        }
        $payment = new Payment;
        $payment->name = $name;
        $payment->amount = $amount;
        $payment->status = $status;
        $payment->save();
        return Response::json([
            'statusCode' => 200,
            'statusMessage' => 'success add record',
            'data' => $payment
        ], 200);
    }
    
    
}