@extends('admin.layouts.admin_datatable') @section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Old Message</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ข้อความที่เคยเห็นแล้ว
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                         <th></th>
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
                                    <td><button class="btn btn-success" >alraedy read </button></td>
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