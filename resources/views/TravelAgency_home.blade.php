@extends('layouts.agency') @section('title', 'Agency') @section('agency_banner')
<link href="css/uptotrain.min.css" rel="stylesheet">
<link href="css/login.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">HELLO {{$travelagencies->agency_name_en}} !!!!</h1>
        </div>
        <div class="col-md-12" style="font-size:1.3em;">
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
                     <h4>
                     </h4>
                       
                    </div>
                    <div class="clearfix"></div>
                    <!-- Show trip here-->
                    <?php
                            $today =date("d-m-y");
                            

                    ?>
                        <ul><h4>ทริปที่กำลังจะถึง</h4>
                            @foreach($travelagencies->trips as $trip)
                                @if(count($trip->tripRounds) > 0 )
                                <li>
                                    <div class="simpleCart_shelfItem">
                                        <div class="view view-first">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3>{{$trip->trips_name}}</h3>
                                                </div>
                                                
                                                <table class="table">
                                                    <tr style="align:center;font-size:1.3em;">
                                                        <th>รอบการเดินทาง</th>
                                                        <th>จำนวนที่นั่งทั้งหมด</th>
                                                        <th>จำนวนที่จองแล้ว</th>
                                                    </tr>
                                                    @foreach($trip->tripRounds as $tripRound)
                                                    <tr>
                                                        <td>
                                                            {{$tripRound->start_date}}
                                                        </td>
                                                        <td>
                                                            {{$tripRound->amount_seats}}
                                                        </td>
                                                        <?php
                                                         //$trId = $tripRound->id;
                                                         $sumbook = DB::table('booking')
                                                     ->where('tripround_id',$tripRound->id)->get();
                                                     $sumnumber = $sumbook->sum('number_booking');
                                                     //    $sumbook = DB::table('booking')->join('triprounds', $trId,'=','booking.tripround_id')
                                                     //    ->sum('number_booking');
                                                     ?> 
                                                         <td> 
                                                             {{$sumnumber}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    <!-- Show trip here-->
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