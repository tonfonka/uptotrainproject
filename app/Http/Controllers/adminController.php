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
use App\User;
use App\contactus;

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

    function usercontact(){
        $contact = DB::table('contactUS')->where('admin_read','0')->get();
        
        $data = array(
            'contact' =>$contact,
        );

        return view('');
    }
    function readcontact(Request $request){
        $contact = User::find($id);
        $contact->admin_read = '1';
        $user->save();
        
        $data = array(
            'contact' =>$contact,
        );

        return view('');
    }


    function approveagency(){
        $agencys = DB::table('users')
        ->join('travelagency','travelagency.user_id','=','users.id')
        ->where([['users.role','travel agency'],['users.adminconfirm','=','0']])->get();
        
        $data = array(
            'agencys' =>$agencys,
        );
        return view('admin.admin_approve',$data);

    }
    function approveagencystore(Request $request){
        $id = $request->user_id;
        //dd($id);
        $user = User::find($id);
        $user->adminconfirm = '1';
        $user->save();
        return redirect('/approveagency');
    }
    function index(){
        
        $agency = DB::table('users')->where([['role','travel agency'],['adminconfirm','=','0']])->get();
        $countagency = $agency->count();
        $countcontact = DB::table('contactUS')->where('admin_read','0')->count();
        $data = array(
            'agency' => $agency,
            'countagency' => $countagency,
            'countcontact' => $countcontact,
        );
        return view('admin.admin_index',$data);
    }

}
