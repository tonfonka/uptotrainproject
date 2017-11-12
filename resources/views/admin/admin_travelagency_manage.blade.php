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
                                        <th>E-mail</th>
                                        <th>Manage</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td>เลขไอดี</td>
                                        <td>ชื่ออังกฤษ</td>
                                        <td>ชื่อไทย</td>
                                        <td class="center">เมล</td>
                                        <td><button class="btn btn-success">view</button></td>
                                        
                                    </tr>
                                    
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