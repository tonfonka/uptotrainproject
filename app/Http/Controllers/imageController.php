<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\ImageGallery;
use  App\schedules;
use App\trip;

class imageController extends Controller
{
    function viewimage(){
       
        return view('image');
    }
    function upload(Request $request){

        // $shcid = $request->input('sch_id');

        // $sc = Array();

        // for($i=0;$i<sizeOf($shcid);$i++){
        //     $data = array($shcid[$i]);
        //     array_push($sc, $data);
        // }

        // foreach($sc as $schid) {
            

                if($request->hasFile('image'))
                {
                        foreach ($request->image as $image){

                            $filename = 'sch_'.str_random(10).$image->getClientOriginalName();
                            $path = public_path('images');
                            $image->move($path,$filename);
                            $ImageGallery = new ImageGallery;
                            $ImageGallery->trip_id = $request->trip_id;
                            $ImageGallery->image = $filename;
                //$ImageGallery->image = $filesize;
                            $ImageGallery->save();

                        }
                // }else {
                //     // $ImageGallery = new ImageGallery;
                //     // $ImageGallery->sch_id = $schid[0];
                //     $ImageGallery->image = '2.jpg';
                //     // $ImageGallery->save();
                // }
        
        } 
        return redirect('/agency');

    }
}
