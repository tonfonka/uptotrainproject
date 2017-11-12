@extends('admin.layouts.admin') @section('content')
   <!-- add -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                         Deny Travel Agency
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ชื่อบริษัทอังกฤษ</th>
                                        <th>ชื่อบริษัทภาษาไทย</th>
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
                                    @foreach($agencys as $agency)
                                    <tr>
                                        <td>{{$agency->agency_name_en}}</td>
                                        <td>{{$agency->agency_name_th}}</td>
                                        <td>{{$agency->	agency_license}}</td>
                                        <td>{{$agency->agency_iata_no}}</td>
                                        <td>{{$agency->agency_tax_id}}</td>
                                        <td>{{$agency->	agency_address}}</td>
                                        <td>{{$agency->agency_province}}</td>
                                        <td>{{$agency->agency_zipcode}}</td>
                                        <td>{{$agency->agency_tel1}}</td>
                                        <td>{{$agency->agency_tel2}}</td>
                                        <td>{{$agency->agency_email}}</td>
                                        <form role="form" action="/deny" method="POST" name="id" enctype="multipart/form-data"> 
                                             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <input type="hidden" name="user_id" value="{{$agency->user_id}}">
                                        <td><button type="submit" class="btn btn-success" name="user_id" value="{{$agency->user_id}}" >
                                        Change to approve
                                        </button> </td>
                                        </tr>
                                        </form>
                                        
                                    @endforeach
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