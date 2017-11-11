@extends('layouts.agency') 
@section('title', 'Agency') 
@section('agency_banner')
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
@endsection 
@section('content')
<div class="container" style="padding-top:30px;">
    <link href="/css/search_tripUser/style.css" rel="stylesheet" type="text/css" />
    <link href="/css/search_tripUser/component.css" rel='stylesheet' type='text/css' />
    <div class="container">
        <div class="products-page">
            <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
            <!-- Show trip here-->
            <?php
                $today =date("y/m/d");
                //dd($today);
            ?>
            <ul>
            <div class="row">
            <div class="col-sm-8 col-md-8">
                <h2>ทริปที่กำลังจะถึง</h2>
                </div>
                    <!--<div class="col-sm-4 col-md-4">
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Trip Name" name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>-->
                </div>
                @foreach($travelagencies->trips as $trip)
                @if(count($trip->tripRounds) > 0 )
                <?php
                $rate = DB::table('reviewTrip')->where('trip_id',$trip->id)->avg('rate');
                 $triprounds = DB::table('triprounds')
                  ->where([['trip_id',$trip->id],['start_date','>',$today]])
                  ->orderBy('start_date','asc')->get();
                  $count = $triprounds->count();
                ?>
                @if($count >0)
                    <li>
                        <div class="simpleCart_shelfItem">
                            <div class="view view-first">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                    
                                        
                                    <a  href="/schedules/{{$trip->id}}" name="{{$trip->id}}"><h3 style="color:#E4AF01;">{{$trip->trips_name}}</h3></a>
                                        <a href="/review/{{$trip->id}}"><h4>ดูความคิดเห็น</h4></a>
                                    </div>
                                <div>
                                <div class="table-responsive text-center">
                                    <table class="table">
                                        <tr style="align:center;font-size:1em;">
                                            <th>รอบการเดินทาง</th>
                                            <th>จำนวนที่นั่งทั้งหมด</th>
                                            <th>จำนวนที่จองแล้ว</th>
                                            <th>สถานะการจอง</th>
                                            <th>ยอดเงินรวม</th>
                                            <th>ยอดเงินสุทธิหลังหักค่าใช้จ่าย</th>
                                            <th><center>รายชื่อคนที่จอง</center></th>
                                        </tr>
                                    @foreach($triprounds as $tripRound)
                                        <tr>
                                            <td>{{date('d/m/Y', strtotime($tripRound->start_date))}} -  {{date('d/m/Y', strtotime($tripRound->departure_date))}}</td>
                                            <td>{{$tripRound->amount_seats}}</td> 
                                            <?php                 
                                                $sumbook = DB::table('booking')->where([['tripround_id',$tripRound->id],['status','=','success']])->get();
                                                $sumnumber = $sumbook->sum('number_booking');
                                                $total = $sumbook->sum('total_cost');
                                                $id=$tripRound->id;
                                            ?> 
                                            <td>{{$sumnumber}}</td>
                                            <?php                       
                                                $sumbook = DB::table('booking')->where([['tripround_id',$tripRound->id],['status','=','success']])->get();
                                                //->where([['tripround_id',$tid],['status','=','success']])
                                                $sumnumber = $sumbook->sum('number_booking');
                                                $total = $sumbook->sum('total_cost');
                                                $id=$tripRound->id;
                                                $percent =(($sumnumber*100)/($tripRound->amount_seats));
                                                $net = ($total*90)/100;
                                            ?> 
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$percent}}%;color:#222;background-color:#34b055;">
                                                    {{$percent}}%
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$total}}</td>
                                            <td>{{$net}}</td>
                                            @if($percent == 0 )
<td style="align:center;">
                                                
                                                    <i class="fa fa fa-user fa-lg" aria-hidden="true" ></i>
                                                
                                            </td>
                                            
                                            @else
                                            <td style="align:center;">
                                                <a href="/shownumber/{{$tripRound->id}}" name ={{$id}}>
                                                    <i class="fa fa fa-user fa-lg" aria-hidden="true" ></i>
                                                </a>
                                            </td>
                                        </tr>  
                                        @endif
                                    @endforeach
                                   
                                    </table>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endif
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