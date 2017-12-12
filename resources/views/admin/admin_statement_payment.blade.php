@extends('admin.layouts.admin_datatable') @section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Travel Agency</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Travel Agency Manage System
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name(EN)</th>
                                        <th>Name(TH)</th>
                                        <th>E-mail login</th>
                                        <th>E-mail agency</th>
                                        <th>Manage</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($agency as $agencys)
                                    <tr class="">
                                        <td>{{$agencys->name}}</td>
                                        <td>{{$agencys->agency_name_en}}</td>
                                        <td>{{$agencys->agency_name_th}}</td>
                                        <td class="center">{{$agencys->email}}</td>
                                        <td class="center">{{$agencys->agency_email}}</td>
                                        <?php
                                        $id = DB::table('travelagency')->where('id',$agencys->id)->first();

                                        ?>
                                       <td><a href="/viewagency/{{$id->id}}"> <button class="btn btn-success">view</button></a>
                                        &nbsp;&nbsp;
                                        <form role="form" action="/denyeagency" method="POST" name="id" enctype="multipart/form-data"> 
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                       <input type="hidden" name="user_id" value="{{$agencys->user_id}}">
                                  <td><button type="submit" class="btn btn-danger" name="user_id" value="{{$agencys->user_id}}">Deny</button></td>
                               </tr>
                               </form>
                                        
                                    </tr>
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