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
use App\review;

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

        return view('admin.admin_message_new',$data);
    }
    function messageold(){
        $contact = DB::table('contactUS')->where('admin_read','1')->get();
        
        $data = array(
            'contact' =>$contact,
        );

        return view('admin.admin_message_old',$data);
    }
    function readcontact(Request $request){
        $id = $request->input('admin_read');
        $contact = contactus::find($id);
        $contact->admin_read = '1';
        $contact->save();
        
        $data = array(
            'contact' =>$contact,
        );

        return redirect('/messagenew');
    }


    function approveagency(){
        $agencys = DB::table('users')
        ->join('travelagency','travelagency.user_id','=','users.id')
        ->where([['users.role','=','travel agency'],['users.adminconfirm','=','0']])->get();
        $data = array(
            'agencys' =>$agencys,
        );
        return view('admin.admin_approve',$data);

    }
    function deny(){
        $agencys = DB::table('users')
        ->join('travelagency','travelagency.user_id','=','users.id')
        ->where([['users.role','=','travel agency'],['users.adminconfirm','=','3']])->get();
        $data = array(
            'agencys' =>$agencys,
        );
        return view('admin.admin_deny',$data);

    }
    function approveagencystore(Request $request){
        $id = $request->input('user_id');
        $user = User::find($request->user_id);
        $user->adminconfirm = '1';
        $user->save();
        return redirect('/approveagency');
    }
    function denyagencystore(Request $request){
        $id = $request->input('user_id');
        $user = User::find($request->user_id);
        $user->adminconfirm = '3';
        $user->save();
        return redirect('/approveagency');
        // public function delete($learner_schedule_id) {
        //     DB::delete('delete from learner_schedule_time WHERE learner_schedule_id = ?', [$learner_schedule_id]);
    
        //     DB::delete('delete from learner_schedule WHERE learner_schedule_id = ?', [$learner_schedule_id]);
            
        //     return redirect(url('learnercoursestatus'));
        }

    function index(){ 
        $agency = DB::table('users')
        ->join('travelagency','travelagency.user_id','=','users.id')
        ->where([['users.role','=','travel agency'],['users.adminconfirm','=','0']])->get();
        $countagency = $agency->count();
        $countcontact = DB::table('contactUS')->where('admin_read','0')->count();
        $data = array(
            'agency' => $agency,
            'countagency' => $countagency,
            'countcontact' => $countcontact,
        );
        return view('admin.admin_index',$data);
    }
    function bancomment(Request $request,$id){

        $id = $request->input('status');
        $tripid = $request->input('trip_id');
        $review = review::find($id);
        $review->status = '1';
        $review->save();

        return redirect()->action(

            'tripAgencyController@reviewtrip', ['tripid' => $tripid]
        );
        
    }
    function travelagency(){ 
          $agency = DB::table('users')
         ->join('travelagency','travelagency.user_id','=','users.id')
         ->where('users.adminconfirm','=','1')
         ->get();
         $countagency = $agency->count();
        // $countcontact = DB::table('contactUS')->where('admin_read','0')->count();
        $data = array(
            'agency' => $agency,
            'countagency' => $countagency,
        );
        return view('admin.admin_travelagency_manage',$data);
    }
    function viewagency($id){ 
        $agency = DB::table('travelagency')
       ->where('id',$id)
       ->first();
      $data = array(
          'agency' => $agency,
          
      );
      return view('admin.admin_travelagency_view',$data);
  }
  function usermanage(){ 
    $user = DB::table('users')
    ->where('role','=','user')
   
   ->get();
   
  $data = array(
      'user' => $user,
  );
  return view('admin.admin_user_manage',$data);
}
function viewuser($id){ 
    $user = DB::table('users')
    ->where('id',$id)

   ->first();
   
  $data = array(
      'user' => $user,
  );
  return view('admin.admin_user_view',$data);
}

function reportcomment(){ 
    $review = DB::table('reviewTrip')
    ->where('status','=','1')
   ->get();
   
  $data = array(
      'review' => $review,
  );
  return view('admin.admin_report_comment',$data);
}
function ignorecomment(Request $request){ 

        $id = $request->input('id');
        $review = review::find($id);
        $review->status = '0';
        $review->save();

        return redirect('/reportcomment');
}
function deletecomment(Request $request){ 

    $id = $request->input('id');
    $review = review::find($id);
    $review->status = '3';
    $review->save();
   
  
  return redirect('/deletecomment');
}
function trashcomment(){ 
    $review = DB::table('reviewTrip')
    ->where('status','=','3')
   ->get();
   
  $data = array(
      'review' => $review,
  );
  return view('admin.admin_trash_comment',$data);
}

}
