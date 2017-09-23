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
                        <h1 class="page-header">$ชื่อทริป</h1>
                    </div>

                    <div>
                        <table class="table" >
                            <tr>
                                <th>รอบวันที่</th>
                                <th>ถึงวันที่</th>
                                <th>สถานะการจอง</th>
                                <th>จำนวนที่นั่ง</th>
                                <th>ยอดเงินรวม</th>
                                <th><center>รายชื่อคนที่จอง</center></th>
                            </tr>
                          
                            <tr>
                                <td>$20/09/2017</a></td>
                                <td>$21/09/2017</a></td>
                                <td>
                                  <div class="progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                      60%
                                      </div>
                                  </div>
                                </td>
                                <td>$จำนวนคนจอง/$จำนวนคนทั้งหมด</td>
                                <td>$จำนวนเงินตอนนี้</td>
                                <td>
                                  <center>
                                      <a href="http://www.facebook.com/">
                                            <i class="fa fa fa-user fa-lg" aria-hidden="true" ></i>
                                        </a>
                                  </center>
                                 </td>
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
