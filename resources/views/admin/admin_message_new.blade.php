@extends('admin.layouts.admin_datatable') @section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Message</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ข้อความที่ยังไม่ได้อ่าน
                        </div>
                        <!-- /.panel-heading -->
                        <form role="form" action="/messagenew" method="POST" name="id" enctype="multipart/form-data"> 
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($contact as $contacts)
                                    <tr class="">
                                        <td>{{$contacts->created_at}}</td>
                                        <td>{{$contacts->name}}</td>
                                        <td>{{$contacts->email}}</td>
                                        <td class="center">{{$contacts->phone}}</td>
                                        <td class="center">{{$contacts->description}}</td>
                                        <input type="hidden" name="admin_read" id="admin_read" value="{{$contacts->id}}">
                                        <td>
                                        <button type="submit" class="btn btn-success"  name="admin_read" value="{{$contacts->id}}">read</button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                        </form>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
</div>
<!-- /.page-wraper -->
@endsection