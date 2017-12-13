@extends('layouts.agency') 
@section('title', 'Add Trip') 
@section('agency_banner')
<div class="welcome about" style="padding-top:0px;padding-bottom:0px;">
    <div class="container" align="center">
        <!-- search panel -->
        <div class="newsletter" style="padding-bottom:0px;height:79px">
            <div class="container">
                <h3 class="agileits-title">Add Trip</h3>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container">
 <link href="{{ URL::asset('css/uptotrain.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('css/login.css')}}" rel="stylesheet">
  <form role="form" action="/agency" method="POST" name="id" enctype="multipart/form-data">
            
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <h3><strong>Step 2 </strong> - Round Information</h3>
                        <div class="step2">
                            <div class="row" id='controls'>
                                <div class="col-md-3" style="padding-top:20px;padding-bottom:20px;">
                                    <label style="margin-bottom:13px;font-size:1.3em;" for="sday">วันเริ่มเดินทาง</label>
                                    <input class="form-control start_day" name="start_date[]" id="sday"type="date" min="2017-11-13" oninvalid="this.setCustomValidity('กรุณากรอกวันเริ่มเดินทาง')"
                                        placeholder="วันเริ่มเดินทาง"  min="2017-08-28" onChange="myStartdate()" required>
                                </div>
                                <div class="col-md-3" style="padding-top:20px;padding-bottom:20px;">
                                    <label style="margin-bottom:13px;font-size:1.3em;" for="eday">วันสิ้นสุดการเดินทาง</label>
                                    <input class="form-control Departure_Date" name="departure_date[]" type="date" id="eday" min="2017-11-13" oninvalid="this.setCustomValidity('กรุณากรอกวันสิ้นสุดการเดินทาง')"
                                        oninput="setCustomValidity('')" placeholder="วันสิ้นสุดการเดินทาง" min="2017-08-28" onChange="myDepardate()" required>
                                </div>
                                <div class="col-md-2" style="padding-top:20px;padding-bottom:20px;">
                                    <label style="margin-bottom:13px;font-size:1.3em;">ราคาของเด็ก</label>
                                    <input type="number" class="form-control" name="price_child[]" min="20" oninvalid="this.setCustomValidity(ราคาเด็ก)" oninput="setCustomValidity('')"
                                        placeholder="ราคาของเด็ก" onChange="myPchild()" required>
                                </div>
                                <div class="col-md-2" style="padding-top:20px;padding-bottom:20px;">
                                    <label style="margin-bottom:13px;font-size:1.3em;">ราคาของผู้ใหญ่</label>
                                    <input type="number" class="form-control" name="price_adult[]" oninvalid="this.setCustomValidity('กรุณากรอกราคาของผู้ใหญ่')"
                                        oninput="setCustomValidity('')" placeholder="ราคาของผู้ใหญ่" min="20" onChange="myPadult()" required>
                                </div>
                                <div class="col-md-2" style="padding-top:20px;padding-bottom:20px;">
                                    <label style="margin-bottom:13px;font-size:1.3em;">จำนวนที่นั่งทั้งหมด </label>
                                    <input type="number" class="form-control" name="amount_seats[]" oninvalid="this.setCustomValidity('กรุณากรอกจำนวนที่นั่ง')"
                                        oninput="setCustomValidity('')" min="1" placeholder="จำนวนที่นั่ง" onChange="myAseats()" required>
                                </div>
                                
                            <input type = "hidden" id="trip_id" name="trip_id" value={{$id}}>
                            </div>
                            <label>
                            <button type="button" class="btn btn-primary" id='btn' >เพิ่มรอบถัดไป</button>
                            </label>

                        </div>
                        <ul class="list-inline pull-right">
                            
                            <li><button type="submit" class="btn btn-primary next-step">ยืนยัน</button></li>
                        </ul>
                        </form>
                        </div>
    </div>
</div>
<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $("#btn").click(function () {
            $("#controls").append(
                '<div class="col-md-3" style="padding-top:20px;padding-bottom:20px;"><label style="margin-bottom:13px;font-size:1.3em;width:150px;">วันเริ่มเดินทาง</label><input class="form-control start_day" name="start_date[]" type="date" min="2017-11-13"  data-validation-required-message="Please enter your ROUND TRIP" onChange="myStartdate()" ></div><div class="col-md-3" style="padding-top:20px;padding-bottom:20px;">                                <label style="margin-bottom:13px;font-size:1.3em;width:150px;">วันเดินทางกลับ</label><input class="form-control Departure_Date" name="departure_date[]" type="date" min="2017-11-13"  onChange="myDepardate()" ></div><br><div class="col-md-2" style="padding-top:20px;padding-bottom:20px;"><label style="margin-bottom:13px;font-size:1.3em;width:150px;">ราคาเด็ก</label>                                <input type="number" class="form-control" name="price_child[]" onChange="myPchild()"  min="20" >                            </div>                            <div class="col-md-2" style="padding-top:20px;padding-bottom:20px;">         <label style="margin-bottom:13px;font-size:1.3em;width:150px;">ราคาผู้ใหญ่</label>                                <input type="number" class="form-control" name="price_adult[]"  data-validation-required-message="Please enter Price_ADUIT " onChange="myPadult()"  min="20">                            </div>                            <div class="col-md-2" style="padding-top:20px;padding-bottom:20px;">                                <label style="margin-bottom:13px;font-size:1.3em;width:150px;">จำนวนที่นั่งทั้งหมด </label>                                <input type="number" class="form-control" name="amount_seats[]" required data-validation-required-message="Please enter Price_ADUIT "  min="1" onChange="myAseats()" >                            </div>'
            );
        })
    })
</script>
@endsection