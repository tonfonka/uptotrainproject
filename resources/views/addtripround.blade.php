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
    <link href="{{ asset('css/uptotrain.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/login.css')}}" rel="stylesheet">

     <div class="row">
        <div class="wizard">
            <div class="wizard-inner">
                <h3>
                    <strong>Trip Name :{{$tripname[0]->trips_name}} </strong>
                </h3>
                <br>
                <h3>
                    <strong>Round Information</strong>
                </h3>
            </div>
        </div>
    </div>
    <form role="form" action="/agency" method="POST" name="id" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        
        <div class="step2">
            <div class="row" id='controls'>
                <div class="col-md-3" style="padding-top:20px;padding-bottom:20px;">
                    <label style="margin-bottom:13px;font-size:1.3em;" for="sday">วันเริ่มเดินทาง</label>
                    <input class="form-control start_day" name="start_date[]" id="sday" type="date" min="2017-11-13" oninvalid="this.setCustomValidity('กรุณากรอกวันเริ่มเดินทาง')" placeholder="วันเริ่มเดินทาง" min="2017-08-28" onChange="myStartdate()" required>
                </div>
                <div class="col-md-3" style="padding-top:20px;padding-bottom:20px;">
                    <label style="margin-bottom:13px;font-size:1.3em;" for="eday">วันสิ้นสุดการเดินทาง</label>
                    <input class="form-control Departure_Date" name="departure_date[]" type="date" id="eday" min="2017-11-13" oninvalid="this.setCustomValidity('กรุณากรอกวันสิ้นสุดการเดินทาง')"
                        oninput="setCustomValidity('')" placeholder="วันสิ้นสุดการเดินทาง" min="2017-08-28" onChange="myDepardate()"
                        required>
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

                <input type="hidden" id="trip_id" name="trip_id" value={{$id}}>
            </div>
            <label>
                <button type="button" class="btn btn-primary" id='btn'>เพิ่มรอบถัดไป</button>
            </label>
        </div>
        <ul class="list-inline pull-right">
            <li>
                <button type="submit" class="btn btn-primary next-step">ยืนยัน</button>
            </li>
        </ul>
        <div class="clearfix"></div>
        <br>
    </form>
</div>
<script>
 var createAllErrors = function() {
        var form = $( this ),
            errorList = $( "ul.errorMessages", form );

        var showAllErrorMessages = function() {
            errorList.empty();

            // Find all invalid fields within the form.
            var invalidFields = form.find( ":invalid" ).each( function( index, node ) {

                // Find the field's corresponding label
                var label = $( "label[for=" + node.id + "] "),
                    // Opera incorrectly does not fill the validationMessage property.
                    message = node.validationMessage || 'Invalid value.';

                errorList
                    .show()
                    .append( "<li><span>" + label.html() + "</span> " + message + "</li>" );
            });
        };
    };
    
    $( "form" ).each( createAllErrors );
    function myStartdate() {
        var date = document.getElementsByName("start_date[]");
        var text = "";
        var i;
        for (i = 0; i < date.length; i++) {
            text += date[i].value + "<hr>";
        }
        document.getElementById('startdate').innerHTML = text;
    }

    function myDepardate() {
        var date = document.getElementsByName("departure_date[]");
        var text = "";
        var i;
        for (i = 0; i < date.length; i++) {
            text += date[i].value + "<hr>";
        }
        document.getElementById('depdate').innerHTML = text;

    }

    function myPchild() {
        var date = document.getElementsByName("price_child[]");
        var text = "";
        var i;
        for (i = 0; i < date.length; i++) {
            text += date[i].value + "<hr>";
        }
        document.getElementById('pchild').innerHTML = text;

    }

    function myPadult() {
        var date = document.getElementsByName("price_adult[]");
        var text = "";
        var i;
        for (i = 0; i < date.length; i++) {
            text += date[i].value + "<hr>";
        }
        document.getElementById('padult').innerHTML = text;

    }

    function myAseats() {
        var date = document.getElementsByName("amount_seats[]");
        var text = "";
        var i;
        for (i = 0; i < date.length; i++) {
            text += date[i].value + "<hr>";
        }
        document.getElementById('aseat').innerHTML = text;

    }

    function mySday() {
        var date = document.getElementsByName("schedule_day[]");
        var text = "";
        var i;
        for (i = 0; i < date.length; i++) {
            text += date[i].value + "<hr>";
        }
        document.getElementById('date').innerHTML = text;

    }

    function myStime() {
        var date = document.getElementsByName("schedule_time[]");
        var text = "";
        var i;
        for (i = 0; i < date.length; i++) {
            text += date[i].value + "<hr>";
        }
        document.getElementById('time').innerHTML = text;

    }

    function mySplace() {
        var date = document.getElementsByName("schedule_place[]");
        var text = "";
        var i;
        for (i = 0; i < date.length; i++) {
            text += date[i].value + "<hr>";
        }
        document.getElementById('pleace').innerHTML = text;

    }

    function mySdes() {
        var date = document.getElementsByName("schedule_description[]");
        var text = "";
        var i;
        for (i = 0; i < date.length; i++) {
            text += date[i].value + "<hr>";
        }
        document.getElementById('desa').innerHTML = text;

    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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