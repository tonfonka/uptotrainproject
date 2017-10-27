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
     
         
            <!-- Page Content -->
            <div class="container">

                <!-- Marketing Icons Section -->
                <div class="row">
                    
                    <div class="col-lg-12">
                    @foreach($trips as $trip)
                    <h1>{{$trip->trips_name}}</h1>
                    @endforeach
                        <h3>รอบ {{date('d/m/Y', strtotime($tripround->start_date))}}  ถึง 	{{date('d/m/Y', strtotime($tripround->departure_date))}}</h1>
                        <h3>จำนวนรายชื่อที่มีการจองทั้งหมด {{$username->count()}} คน </h3>
                        
                        
                    </div>

                    <div>
                        <table class="table">
                            <tr>
                                <th>ชื่อ</th>
                                <th>เด็ก</th>
                                <th>ผู้ใหญ่</th>
                                <th>รวมทั้งหมด</th>
                                <th>ราคา</th>
                                <th>สถานะการจ่าย</th>
                                <th>รายการล่าสุดเมื่อ</th>
                            </tr>
                            @if($count >0)
                            @foreach($booking as $boo)
                                @foreach($username as $user)
                                     
                            <tr>
                                <td><a href=''>{{$user->name}}</a></td>
                                
                                <td>{{$boo->number_children}}</td>
                                <td>{{$boo->number_adults}}</td>
                                <td>{{$boo->number_booking}}</td>
                                <td>{{$boo->total_cost}}</td>
                                <td>{{$boo->status}}</td>
                                <td>{{$boo->booking_time}}</td>
                            </tr> 
                
                                                
                                @endforeach
                            @endforeach
                            <tr>
                                <td>ยอดรวมรายชื่อการจอง </td>
                                <td>จำนวนเด็กทั้งหมด </td>
                                <td>จำนวนผู้ใหญ่ทั้งหมด</td>
                                <td>ยอดรวมคนทั้งหมด </td>
                                <td>ยอดรวมราคาทั้งหมด </td>
                                <td>พิมพ์รายชื่อคนจองทริป </td>

                            </tr>
                            <tr>
                                <td> {{$count}} </td>
                                <td> {{$totalChild}} </td>
                                <td>{{$totalAdult}} </td>
                                <td>  {{$totalNum}} </td>
                                <td>{{$totalMoney}} </td>
                                <td> <a href="/pdf">พิมพ์รายชื่อผู้ร่วมทริป PDF</a> </td>

                            </tr>
                            @endif
                        </table>
                    </div>
                   
                   

                </div><!-- end Marketing Icons Section -->
            </div><!-- end Page Content -->
        </div><!-- end products-page -->
    </div><!-- end container -->

    <script src="js/search_tripUser/cbpViewModeSwitch.js" type="text/javascript"></script>
    <script src="js/search_tripUser/classie.js" type="text/javascript"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</div>

@endsection