@extends('layouts.agency') @section('title', 'Agency') @section('agency_banner')
<link href="css/uptotrain.min.css" rel="stylesheet">
<link href="css/login.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">HELLO $travelagencies->agency_name_en !!!!</h1>
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
                        <h1>$ชื่อทริป</h1>
                        <h3>รอบ $รอบวันที่เริ่ม ถึง $รอบวันที่จบ</h1>
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
                          
                            <tr>
                                <td><a href=''>$ชื่อ</a></td>
                                <td>$จำนวนเด็ก</td>
                                <td>$จำนวนผู้ใหญ่</td>
                                <td>$จำนวนรวมทั้งหมด</td>
                                <td>$ราคา</td>
                                <td>$สถานะการจ่าย</td>
                                <td>$รายการล่าสุดเมื่อ</td>
                            </tr>
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