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
 
<div class="container">
 <link href="css/uptotrain.min.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">
    <div class="row">
            <form role="form" action="/agency" method="POST" name="id" enctype="multipart/form-data">
            
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <h3><strong>Step 2 </strong> - Round Information</h3>
                            <div class="row" id='controls'>
                                <div class="col-md-3" style="padding-top:20px;padding-bottom:20px;">
                                    <label style="margin-bottom:13px;font-size:1.3em;" >วันเริ่มเดินทาง</label>
                                    <input type="date" class="form-control " name="start_date[]"   min="2017-11-13" 
                                        placeholder="วันเริ่มเดินทาง"    required>
                                </div>
                                <div class="col-md-3" style="padding-top:20px;padding-bottom:20px;">
                                    <label style="margin-bottom:13px;font-size:1.3em;" >วันสิ้นสุดการเดินทาง</label>
                                    <input type="date" class="form-control " name="departure_date[]"   min="2017-11-13" 
                                        placeholder="วันสิ้นสุดการเดินทาง" required>
                                </div>
                                <div class="col-md-2" style="padding-top:20px;padding-bottom:20px;">
                                    <label style="margin-bottom:13px;font-size:1.3em;">ราคาของเด็ก</label>
                                    <input type="number" class="form-control" name="price_child[]" min="20" 
                                        placeholder="ราคาของเด็ก"  required>
                                </div>
                                <div class="col-md-2" style="padding-top:20px;padding-bottom:20px;">
                                    <label style="margin-bottom:13px;font-size:1.3em;">ราคาของผู้ใหญ่</label>
                                    <input type="number" class="form-control" name="price_adult[]"  placeholder="ราคาของผู้ใหญ่" min="20"  required>
                                </div>
                                <div class="col-md-2" style="padding-top:20px;padding-bottom:20px;">
                                    <label style="margin-bottom:13px;font-size:1.3em;">จำนวนที่นั่งทั้งหมด </label>
                                    <input type="number" class="form-control" name="amount_seats[]"  min="1" placeholder="จำนวนที่นั่ง"  required>
                                </div>
                                <input type="hidden" id="trip_id" name="trip_id" value={{$id}}>
                            </div>

                            <label>
                            <button type="button" class="btn btn-primary" id='btn' >เพิ่มรอบถัดไป</button>
                            
                            </label>
                       <button type="submit" class="btn btn-primary" id ="new">ยืนยัน</button>
  
                       
                    </div>
           
        </div>
    </div>
</div>
 </form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#btn").click(function () {
            $("#controls").append(
                '<div class="col-md-3" style="padding-top:20px;padding-bottom:20px;"><label style="margin-bottom:13px;font-size:1.3em;width:150px;">วันเริ่มเดินทาง</label><input class="form-control start_day" name="start_date[]" type="date" min="2017-11-13"  data-validation-required-message="Please enter your ROUND TRIP" onChange="myStartdate()" ></div><div class="col-md-3" style="padding-top:20px;padding-bottom:20px;">                                <label style="margin-bottom:13px;font-size:1.3em;width:150px;">วันเดินทางกลับ</label><input class="form-control Departure_Date" name="departure_date[]" type="date" min="2017-11-13" data-validation-required-message="Please enter your ROUND TRIP" onChange="myDepardate()" ></div><br><div class="col-md-2" style="padding-top:20px;padding-bottom:20px;"><label style="margin-bottom:13px;font-size:1.3em;width:150px;">ราคาเด็ก</label>                                <input type="number" class="form-control" name="price_child[]" onChange="myPchild()"  min="20" >                            </div>                            <div class="col-md-2" style="padding-top:20px;padding-bottom:20px;">         <label style="margin-bottom:13px;font-size:1.3em;width:150px;">ราคาผู้ใหญ่</label>                                <input type="number" class="form-control" name="price_adult[]"  data-validation-required-message="Please enter Price_ADUIT " onChange="myPadult()"  min="20">                            </div>                            <div class="col-md-2" style="padding-top:20px;padding-bottom:20px;">                                <label style="margin-bottom:13px;font-size:1.3em;width:150px;">จำนวนที่นั่งทั้งหมด </label>                                <input type="number" class="form-control" name="amount_seats[]"  data-validation-required-message="Please enter Price_ADUIT "  min="1" onChange="myAseats()" >                            </div>'
            );
        })
    })
</script>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    $(document).ready(function () {
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }
</script>
@endsection