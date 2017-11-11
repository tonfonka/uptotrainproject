@extends('admin.layouts.admin') @section('content')
   <!-- add -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                            Wait for Approve
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ชื่อบริษัทภาษาไทย</th>
                                        <th>Name</th>
                                        <th>License</th>
                                        <th>Iata no.</th>
                                        <th>Tax id</th>
                                        <th>Address</th>
                                        <th>province</th>
                                        <th>zipcode</th>
                                        <th>tel1</th>
                                        <th>tel2</th>
                                        <th>email</th>
                                        <th><center>status</enter></th>
                                    </tr>
                                    <tr>
                                        <td>ชื่อบริษัทภาษาไทย</td>
                                        <td>Name</td>
                                        <td>License</td>
                                        <td>Iata no.</td>
                                        <td>Tax id</td>
                                        <td>Address</td>
                                        <td>province</td>
                                        <td>zipcode</td>
                                        <td>tel1</td>
                                        <td>tel2</td>
                                        <td>email</td>
                                        <td><button class="btn btn-success">Approve</button>  <button class="btn btn-danger">Deny</button></td>
                                    </tr>
                                </thead>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
                

        </div>
        <!-- /.row -->
            
    </div>
    <!-- /#page-wrapper -->
    <!-- add end -->

@endsection