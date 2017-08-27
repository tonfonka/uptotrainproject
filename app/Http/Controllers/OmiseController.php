<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\trip;
use App\schedules;
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


    function checkout(){
    
        $charge = \OmiseCharge::create(array(
            'amount' => 320000,
            'currency' => 'thb',
            'card' => $_POST['omiseToken']
          
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

          //  'return_uri' => 'http://animal-aid.me/all',
              'return_uri' => 'http://localhost:8000/all',
            'metadata' => ['name' => $name, 'sname' => $sname, 'tel' => $tel]
          ));
        return Response::json([
            'statusCode' => 200,
            'url' => $charge['authorize_uri']
            ], 200);
    }


     function webhook(Request $request){
        $payload = $request->json()->all();
        if($payload['key'] === 'charge.complete'){
            if($payload['data']['paid']){ //ถ้าจ่ายสำเร็จ
                //ส่ง SMS
                $tel = $payload['data']['metadata']['tel'];
                $tel = preg_replace('/^0/', '66', $tel);
                $name = $payload['data']['metadata']['name'];
                $sname = $payload['data']['metadata']['sname'];
                $amount = $payload['data']['amount'];
                $amount = substr($amount, 0, strlen($amount)-2).'.'.substr($amount, -2);
                Nexmo::message()->send([
                    'to' => $tel,
                    'from' => 'NEXMO',
                    'text' => 'ขอขอบคุณ '.$name.' '.$sname.' ที่บริจาคเงินจำนวน '.$amount.' บาท ให้แก่ ANIMAL-AID',
                    'type' => 'unicode'
                ]);
                return Response::json([
                    'statusCode' => 200,
                    'statusMessage' => 'Success',
                    'payload' => $amount
                    ], 200);

            }else{ //ถ้าจ่ายไม่สำเร็จ

            }
        }
    }
    
    








}
