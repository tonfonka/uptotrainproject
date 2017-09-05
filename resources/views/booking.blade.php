<html>

<head>
  <meta charset="utf-8">
  <title>Up To train</title>
  <!-- Bootstrap Core CSS -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- เปิดแล้ว Theme CSS -->
  <link href="/css/uptotrain2.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
</head>
<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    #selectBooking{
      display: block;
    }
</style>

<body id="page-top" class="index">
  <div id="selectBooking">
  <div align="right">
    <a class="btn btn-primary" href={{ url( '/search') }} 
    style="
    padding-top: 12px;
    padding-bottom: 12px;
    padding-left: 15px;
    padding-right: 15px;background-color:#fff;border-color:#fff;">
    <i class="fa fa-times" style="color:#000000;font-size:50px;"></i></a>
  </div>

  <div class="welcome about" style="padding-top:90px;">
    <div class="container" align="center">
      <div class="row">
        @foreach($trip as $trips)
        <div>
          <h1>{{$trips->trips_name}}</h1>
          <p>{{$trips->trip_nday}}วัน {{$trips->trip_nnight}}คืน</p>
          <p>จังหวัด{{$trips->trip_province}}</p>
          <p>{{$trips->trip_meal}}มื้อ</p>
          <img class="img-responsive img-centered" src="/img/portfolio/trip1_00.jpg" alt="">
          <br>
        </div>
        @endforeach
        <div class="row">
          
          <div class="col-md-12" style ="align:center;">
            
              <?php
                    
                    if($count == 0){
                        $sum = $triprounds->amount_seats;
                    }
                    else if($count > 0 ){
                        $amount =  $triprounds->amount_seats;
                        
                        $sum = $amount-$sumbook;
                    }
                      $bookId = $triprounds->id;      
                    ?>
                  
                <form action="/bookingsum" method="POST" name="id">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                 {{ csrf_field() }}
                 <input type="hidden" name="book_id" value="{{ $bookId }}">
                  รอบวันที่ {{date('d-m-Y', strtotime($triprounds->start_date))}} ถึง {{date('d-m-Y', strtotime($triprounds->departure_date))}}
                  <br> จำนวนเด็ก
                  <input type="number" name="number_children" id="number_children" min="0" max={{$sum}} value="0">                  ราคา :: {{$triprounds->price_child}}
                  <h3 id="pchild"></h3>

                   จำนวนผู้ใหญ่
                  <input type="number" name="number_adults" id="number_adults" min="0" max={{$sum}} value="0">                  
                  ราคา :: {{$triprounds->price_adult}} 

                  <h3 id="padult"></h3>
                  สถานะการจอง : <h3 id="summary"></h3>
                  <h3>ที่นั่งว่าง :: {{$sum}} /จำนวนที่นั่งทั้งหมด :: {{$triprounds->amount_seats}}</h3>
                  <h4>
                  จำนวนคนจองทั้งหมด : 
                  <!-- //<p id="number_booking"  ></p>  -->
                  <input type="number"  id="number_booking" name="number_booking" readonly >

                  </h4>
                  <br>
                    
                  <h4>ราคารวมทั้งหมด :
                  <!-- <p id="total_cost"></p>  -->
                   <input type="number"  id="total_cost" name="total_cost" readonly>
                  </h4>
                    <br>
                   <button id="booking_btn" type="submit" class="btn btn-primary">จองตอนนี้</button>
                </form>
               
            
          </div>
        
          <div class="col-md-3"></div>
        </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
                  </div>
<!-- <script src="{{url('vendor/jquery/jquery.min.js')}}"></script> -->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="{{url('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Bootstrap Core JavaScript -->

<!-- Plugin JavaScript -->
<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb"
  crossorigin="anonymous"></script>

<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="js/agency.min.js"></script>
<script>
  let allPerson = 0
  $('#number_children').bind('click keyup', function() {
    const value = $(this).val()
    const multiple = {{$triprounds->price_child}}
    $('#pchild').html("ราคารวมเด็กทั้งหมด" + value * multiple+"บาท")
    const allChild = $('#number_children').val()*1
    const allAdult = $('#number_adults').val()*1
    $('#number_booking').val(allChild+allAdult)
    $('#total_cost').val((allChild*{{$triprounds->price_child}})+(allAdult*{{$triprounds->price_adult}}))
    if(isEnough()){
      $('#summary').html('OK')
    }else{
      $('#summary').html('กรุณากรอกจำนวนคนใหม่')
    }
  })

  $('#number_adults').bind('click keyup', function() {
    const value = $(this).val()
    const multiple = {{$triprounds->price_adult}} 
    $('#padult').html("ราคารวมผู้ใหญ่ทั้งหมด" + value * multiple+"บาท")
    const allChild = $('#number_children').val()*1
    const allAdult = $('#number_adults').val()*1
    $('#number_booking').val(allChild+allAdult)
    $('#total_cost').val((allChild*{{$triprounds->price_child}})+(allAdult*{{$triprounds->price_adult}}))
    if(isEnough()){
      $('#summary').html('OK')
    }else{
      $('#summary').html('กรุณากรอกจำนวนคนใหม่')
    }
  })

  function isEnough(){
    const allChild = $('#number_children').val()*1
    const allAdult = $('#number_adults').val()*1
    return (allChild+allAdult) <= {{$sum}}
  }

</script>
</body>


</html>