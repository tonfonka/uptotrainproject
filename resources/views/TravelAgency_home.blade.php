@extends('layouts.agency') @section('title', 'Agency') @section('agency_banner')
<link href="css/uptotrain.min.css" rel="stylesheet">
<link href="css/login.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">HELLO {{$travelagency[0]->agency_name_en}} !!!!</h1>
        </div>
        <div class="col-md-12" style="font-size:1.3em;">
            {{$travelagency[0]->agency_description}}
        </div>
    </div>
</div>
<!-- /.row -->
@endsection @section('content')
<div class="container" style="padding-top:30px;">
    <link href="/css/search_tripUser/style.css" rel="stylesheet" type="text/css" />
    <link href="/css/search_tripUser/component.css" rel='stylesheet' type='text/css' />
    <div class="container">
        <div class="products-page">
            <div class="products">
                <div class="product-listy">
                    <h2>All trips</h2>
                    <ul class="product-list">
                        <li><a href="">New Trips</a></li>
                        <li><a href="">Available Tour</a></li>
                        <li><a href="">Hot Price</a></li>
                    </ul>
                </div>
            </div>
            <div class="new-product">
                <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
                    <div class="pages">
                     <h4><?php 
                     use Carbon\Carbon;
                     $dt     = Carbon::now();
                     echo $dt->subDays(10)->diffForHumans();  ?>
                     </h4>
                        <h4>{{$trips->count()}} total trips</h4>
                    </div>
                    <div class="clearfix"></div>
                    <ul>
                        @foreach($trips as $tripuser )
                        <li>
                            <div class="simpleCart_shelfItem">
                                <div class="view view-first">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3>{{$tripuser->trips_name}}</h3>
                                        </div>
                                        <div class="panel-body">
                                            <img class="img-responsive img-portfolio img-hover" src="">
                                            </a>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span> 40% BOOKING
                                                </div>
                                            </div>
                                            <!-- Table -->
                                            <table class="table">
                                                <!--problem ตรงนี้ไม่รัน -->
                                                <?php
                                            $tripagent = DB::table('travelagency')->where('id', $tripuser->travelagency_id)->first();
                                            
                                            $tripround = DB::table('triprounds')->where('trip_id', $tripuser->id)->get();
                                            ?>
                                                    <tr style="align:center;font-size:1.3em;">
                                                        <th>รอบการเดินทาง</th>
                                                        <th>จำนวนที่นั่งทั้งหมด</th>
                                                        <th>จำนวนที่จองแล้ว</th>
                                                    </tr>
                                                    @foreach($tripround as $tr)
                                                    <tr style="font-size:1.3em;">
                                                        <td>{{date('d-m-Y', strtotime($tr->start_date))}} ถึง {{date('d-m-Y',
                                                            strtotime($tr->departure_date))}}
                                                        </td>
                                                        <td>{{$tr->amount_seats}}</td>
                                                        <td>{{$tr->amount_seats}}</td>
                                                    </tr>
                                                    @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- Page Content -->
            <div class="container">

                <!-- Marketing Icons Section -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            COMMENTION
                        </h1>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4><i class="glyphicon glyphicon-pencil"></i>TRIP </h4>
                            </div>
                            <div class="panel-body">
                                <p>
                                    <div class="alert alert-success" role="alert">
                                        Well done! You have n new COMMENTION .
                                    </div>
                                </p>
                                <a href="comment_TRIP.html" class="btn btn-default">SHOW NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4><i class="glyphicon glyphicon-pencil"></i>COMPANY </h4>
                            </div>
                            <div class="panel-body">
                                <p>
                                    <div class="alert alert-success" role="alert">
                                        Well done! You have n new COMMENTION .
                                    </div>
                                </p>
                                <a href="comment_TRIP.html" class="btn btn-default">SHOW NOW</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="js/search_tripUser/cbpViewModeSwitch.js" type="text/javascript"></script>
    <script src="js/search_tripUser/classie.js" type="text/javascript"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</div>
<div class="clearfix"></div>
@endsection