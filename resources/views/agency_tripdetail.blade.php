@extends('layouts.agency') 
@section('agency_banner')
<link href=" {{ URL::asset('css/uptotrain.min.css') }}" rel="stylesheet">
<link href=" {{ URL::asset('css/login.css') }}" rel="stylesheet">
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
@endsection
@section('content')
<div class="container" style="padding-top:30px;">
<link href=" {{ URL::asset('css/search_tripUser/style.css') }}" rel="stylesheet">
<link href=" {{ URL::asset('css/search_tripUser/component.css') }}" rel="stylesheet">
    
    <div class="container">
        <div class="products-page">
            <!-- Page Content -->
            <div class="container">
                <!-- Marketing Icons Section -->
                <?php
                            $today =date("d-m-y");
                    ?>
                <div class="row">
                    <div class="col-lg-12">
                    @foreach($travelagencies->trips as $trip)
                                @if(count($trip->tripRounds) > 0 )
                        <h1 class="page-header">{{$trip->trips_name}}</h1>
                    </div>
                    <div class="clearfix"></div>
                    <div>
                        <table class="table">
                            <tr>
                                <th>รอบวันที่</th>
                                <th>ถึงวันที่</th>
                                <th>สถานะการจอง</th>
                                <th>จำนวนที่นั่ง</th>
                                <th>ยอดเงินรวม</th>
                                <th>
                                    <center>รายชื่อคนที่จอง</center>
                                </th>
                            </tr>
                            @foreach($trip->tripRounds as $tripRound)
                            <tr>
                                <td>{{$tripRound->start_date}} </a>
                                </td>
                                <td>{{$tripRound->departure_date}}</a>
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                                            10%
                                        </div>
                                    </div>
                                </td>
                                <?php
                                                         
                                           $sumbook = DB::table('booking')
                                            ->where('tripround_id',$tripRound->id)->get();
                                           $sumnumber = $sumbook->sum('number_booking');
                                            $total = $sumbook->sum('total_cost');
                                            $id=$tripRound->id;
                                ?> 
                                <td>{{$sumnumber}}/{{$tripRound->amount_seats}}</td>
                                <td> {{$total}}</td>
                                <td>
                                    <center>
                                        <a href="/">
                                            <i class="fa fa fa-user fa-lg" aria-hidden="true" ></i>
                                        </a>
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <!-- end Marketing Icons Section -->
            </div>
            <!-- end Page Content -->
        </div>
        @endif
                            @endforeach
        <!-- end products-page -->
    </div>
    <!-- end container -->
    <script src="js/search_tripUser/cbpViewModeSwitch.js" type="text/javascript"></script>
    <script src="js/search_tripUser/classie.js" type="text/javascript"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</div>
<div class="clearfix"></div>
@endsection