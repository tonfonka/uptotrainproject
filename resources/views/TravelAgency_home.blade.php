@extends('layouts.agency') 
@section('title', 'Agency') 
@section('agency_banner')
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
            
                <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
                    
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
                                                <h3 style="color:#E4AF01;">{{$trip->trips_name}}</h3>
                                                <!--<a  href="/tripdetail/{{$trip->id}}" name="{{$trip->id}}"></a>-->
                                                
                                                
                                                </div>
                                                <div>
                                                <table class="table">
                                                    <tr style="align:center;font-size:1.3em;">
                                                        <th>รอบการเดินทาง</th>
                                                        <th>จำนวนที่นั่งทั้งหมด</th>
                                                        <th>จำนวนที่จองแล้ว</th>
                                                        <th>สถานะการจอง</th>
                                                        <th>ยอดเงินรวม</th>
                                                        <th>
                                    <center>รายชื่อคนที่จอง</center>
                                </th>
                                                    </tr>
                                                    @foreach($trip->tripRounds as $tripRound)
                                                    <?php
                                                         
                                                         $order = $tripRound->orderBy('start_date')->get();

                                                     ?> 
                                                    <tr>
                                                    <td>
                                                            {{date('d/m/Y', strtotime($tripRound->start_date))}} -  {{date('d/m/Y', strtotime($tripRound->departure_date))}}
                                                        </td>
                                                        <td>
                                                            {{$tripRound->amount_seats}}
                                                        </td> 
                                                        
                                                        <?php
                                                         
                                                         $sumbook = DB::table('booking')
                                                         ->where([['tripround_id',$tripRound->id],['status','=','success']])->get();
                                                        $sumnumber = $sumbook->sum('number_booking');
                                                        $total = $sumbook->sum('total_cost');
                                                        $id=$tripRound->id;

                                                        ?> 
                                                         <td> 
                                                         
                                                         {{$sumnumber}}
                                                        </td>
                                                         <?php
                                                         
                                           $sumbook = DB::table('booking')
                                            ->where([['tripround_id',$tripRound->id],['status','=','success']])->get();
                                            //->where([['tripround_id',$tid],['status','=','success']])
                                           $sumnumber = $sumbook->sum('number_booking');
                                            $total = $sumbook->sum('total_cost');
                                            $id=$tripRound->id;
                                            $percent =(($sumnumber*100)/($tripRound->amount_seats));
                                ?> 
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$percent}}%;color:#222;background-color:#34b055;">
                                        {{$percent}}%
                                        </div>
                                    </div>
                                </td>
                                                        <td>
                                                            {{$total}}
                                                            <!-- ยอดเงินรวม -->
                                                        </td>
                                                        <td>
                                    <center>
                                        <a href="/shownumber/{{$tripRound->id}}" name ={{$id}}>
                                            <i class="fa fa fa-user fa-lg" aria-hidden="true" ></i>
                                        </a>
                                    </center>
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
            
            <!-- Page Content -->
            <div class="container">
                <!-- Marketing Icons Section -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            COMMENT
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
                                        Well done! You have new comment.
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
                                        Well done! You have new comment.
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
  
</div>
<div class="clearfix"></div>
@endsection