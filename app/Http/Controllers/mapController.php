<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Response;
use App\tripround;
use App\schedule;
use App\trip;
use App\booking;
use App\travelagency;
use Auth;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class mapController extends Controller
{
    function station(){
        $stations = DB::table('stations')->get();
        return view('map',['stations'=> $stations]);
    }

    function getLAT(){
        $s = Input::post('station');
        $data = array(
            's' => $s
        );
        return view('map',$data);
    }
    public function showmap(){
        Mapper::map(10.2928760, 123.9016380);
		return view('showmap');
}
public function moveMapToLocation(MoveMapToLocationRequest $request)
{
    $location = Mapper::location($request->input('location'));
    $data = [
        'status' => 'success', 
        'latitude' => $location->getLatitude(), 
        'longitude' => $location->getLongitude()
    ];
    
    return response()->json($data);
}

        
    }
   

