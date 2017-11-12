@extends('admin.layouts.admin_datatable') @section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Blacklist User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Show Blacklist User
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td>เลขไอดี</td>
                                        <td>ชื่อจริง</td>
                                        <td>นามสกุล</td>
                                        <td>name</td>
                                        <td>E-mail</td>
                                        <td><button class="btn btn-warning">cancle</button>&nbsp;&nbsp;
                                        <button class="btn btn-danger">delete</button</td>   
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