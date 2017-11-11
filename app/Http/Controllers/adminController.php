<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use DB;
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

class adminController extends Controller
{
    function contactus(Request $request){
       DB::table('contactUS')
        ->insertGetId([
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "phone" => $request->input('phone'),
            "description" => $request->input('description')
        ]);
        return redirect('/contactus');
    }
}
