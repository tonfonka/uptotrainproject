@extends('admin.layouts.admin_datatable') @section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Report Comment</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Report Comment by Travel Agency
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>email user</th>
                                        <th>เจ้าของโพส</th>
                                        <th>ชื่อทริป</th>                    
                                        <th>ชื่อบริษัทผู้แจ้ง</th>                             
                                         <th>ระดับดาว</th>
                                        <th>ข้อความ</th>
                                        <th>Manage</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($review as $reviews)
                                <?php
                                    $users = DB::table('users')->where('id',$reviews->user_id)->get();
                                    $tripname = DB::table('trips')->where('id',$reviews->trip_id)->get();
                                    $tripid = DB::table('trips')->select('travelagency_id')->where('id',$reviews->trip_id)->pluck('travelagency_id');
                                    $agency = DB::table('travelagency')->where('id',$tripid)->get();
                                ?>
                                    <tr class="">
                                        <td>{{$users[0]->email}}</td>
                                        <td>{{$users[0]->name}}</td>
                                        <td>{{$tripname[0]->trips_name}}</td>
                                        <td>{{$agency[0]->agency_name_en}}</td>
                                        <td class="center">{{$reviews->rate}}</td>
                                        <td class="center">{{$reviews->rate_des}}</td>
                                      
                                        <form role="form" action="/reportcomment" method="POST" name="id" enctype="multipart/form-data"> 
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <input type="hidden" name="id" value="{{$reviews->id}}">
                                       <td><button type="submit" name="id" value="{{$reviews->id}}" class="btn btn-success">Ignore</button>
                                       </form>
                                        &nbsp;&nbsp;

                                        <form role="form" action="/deletecomment" method="POST" name="id" enctype="multipart/form-data"> 
                                             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                             <input type="hidden" name="id" value="{{$reviews->id}}">
                                  <td><button type="submit" class="btn btn-danger" name="id" value="{{$reviews->id}}">Trash</button></td>
                               </tr>
                               </form>
                               
                                        
                                 @endforeach   
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
</div>
<!-- /.page-wraper -->
@endsection