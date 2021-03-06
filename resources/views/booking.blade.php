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

<body id="page-top" class="index">
  <div align="right">
    <a class="btn btn-primary" href={{ url( '/search') }} 
    style="padding-top: 12px; padding-bottom: 12px;
    padding-left: 15px;padding-right: 15px;background-color:#fff;border-color:#fff;">
    <i class="fa fa-times" style="color:#000000;font-size:50px;"></i></a>
  </div>
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
  <div class="welcome about">
    <div class="container" align="center">
      <div class="row">
        @foreach($trip as $trips)
        <div>
          <h1>{{$trips->trips_name}}</h1>
          @if($trips->trip_nnight > 0)
           <p class="item-intro text-muted"> ระยะเวลา {{$trips->trip_nday}} วัน {{$trips->trip_nnight}} คืน</p>
          @else
           <p class="item-intro text-muted"> ระยะเวลา {{$trips->trip_nday}} วัน</p>
          @endif
          <p class="item-intro text-muted">จังหวัด{{$trips->trip_province}}</p>
          <p class="item-intro text-muted">จำนวนมื้ออาหาร {{$trips->trip_meal}} มื้อ</p>
          <h4>รอบวันที่ {{date('d-m-Y', strtotime($triprounds->start_date))}}
                    ถึง {{date('d-m-Y', strtotime($triprounds->departure_date))}}</h4>
           <h4>จำนวนที่นั่งว่าง {{$sum}} คน จากจำนวนที่นั่งทั้งหมด {{$triprounds->amount_seats}}</h4>
          <img class="img-responsive img-centered" style="height:500px;width:850px;" src="/images/{{$trips->image}}" alt="">
          <br>
        </div>
        @endforeach
       
        <form action="/bookingsum" method="POST" name="id">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> {{ csrf_field() }}
              <input type="hidden" name="book_id" value="{{ $bookId }}"> 
          <div class="row">
            <div class="full-width bg-white">
              <div class="container">
                  <div id="price_info">
                      <div class="col-xs-12 box">
                        <div class="row row-odd row-title" style="background-color:#fe9205;color:#fff;font-size:24px;">
                          <label class="col-xs-4"><strong>รายการที่ท่านเลือก</strong></label>
                          <label class="col-xs-2 text-center"><strong>ราคา (บาท)</strong></label>
                          <label class="col-xs-3 text-center"><strong>จำนวนผู้เดินทาง (คน)</strong></label>
                          <label class="col-xs-3 text-right"><strong>รวมราคา (บาท)</strong></label>
                        </div>
                        <div class="row item-selected row-even" style="display: block;">
                          <label class="col-xs-4"><h3>ผู้ใหญ่</h3></label>
                          <label class="col-xs-2 text-center"><h3>{{$triprounds->price_adult}}</h3></label>
                          <label class="col-xs-3 text-center"><h3><input type="number" name="number_adults" id="number_adults" min="0" max={{$sum}} value="0"></h3></label>
                          <label class="col-xs-3 text-right"><h3 id="padult"></h3></strong></label>
                        </div>
                        <div class="row item-selected row-even" style="display: block;">
                          <label class="col-xs-4"><h3>เด็ก</h3></label>
                          <label class="col-xs-2 text-center"><h3>{{$triprounds->price_child}}</h3></label>
                          <label class="col-xs-3 text-center"><h3><input type="number" name="number_children" id="number_children" min="0" max={{$sum}} value="0">	</h3></label>
                          <label class="col-xs-3 text-right"><h3 id="pchild"></h3></strong></label>
                        </div>
                        <div class="row row-odd-2" style="background-color:#857a69;color:#fff;font-size:24px;">
                          <label class="col-xs-4" ><h4>รวมราคาทั้งหมด</h4></label>
                          <label class="col-xs-2 text-center"><h4 id="summary"></h4></label>
                          <h3 class="col-xs-3 text-center"><input style="border:none;background: transparent;"class="text-center"type="number" id="number_booking" name="number_booking" readonly></h3>
                          <h3 class="col-sm-3 text-center"><input style="border:none;background: transparent;" class="text-center" type="number" id="total_cost" name="total_cost" readonly></h3>
                        </div>
                      </div>
										</div>
                  </div>
                <div class="col-sm-12 col-xs-12 font-txt row-margin-b clearpd">
                  <br>
                <button id="booking_btn" type="submit" class="btn btn-primary" style="padding-top: 20px;padding-bottom: 20px;padding-left: 25px;padding-right: 25px;font-size:24px;
" >จองตอนนี้</button>
                </div>
              <div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <!-- <script src="{{url('vendor/jquery/jquery.min.js')}}"></script> -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
  <script src="{{url('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- Bootstrap Core JavaScript -->


  <!-- Plugin JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb"
    crossorigin="anonymous"></script>


  <script>
    let allPerson = 0
    $('#number_children').bind('click keyup', function () {
      const value = $(this).val()
      const multiple = {{$triprounds->price_child}}
      
      $('#pchild').html(value * multiple)
      const allChild = $('#number_children').val() * 1
      const allAdult = $('#number_adults').val() * 1
      $('#number_booking').val(allChild + allAdult)
      $('#total_cost').val((allChild * {{$triprounds->price_child}}) + (allAdult * {{$triprounds->price_adult}}))
      if (isEnough()) {
        $('#summary').html('')
      } else {
        $('#summary').html('กรุณากรอกจำนวนคนใหม่')
      }
    })
    $('#number_adults').bind('click keyup', function () {
      const value = $(this).val()
      const multiple = {{$triprounds->price_adult}}
      $('#padult').html(value * multiple)
      const allChild = $('#number_children').val() * 1
      const allAdult = $('#number_adults').val() * 1
      $('#number_booking').val(allChild + allAdult)
      $('#total_cost').val((allChild * {{$triprounds->price_child}}) + (allAdult * {{$triprounds->price_adult}}))
      if (isEnough()) {
        $('#summary').html('')
      } else {
        $('#summary').html('กรุณากรอกจำนวนคนใหม่')
      }
    })
    function isEnough() {
      const allChild = $('#number_children').val() * 1
      const allAdult = $('#number_adults').val() * 1
      return (allChild + allAdult)<={{$sum}}
    }
    </script>
    <!-- swipe box js -->
  <script src="js/jquery.swipebox.min.js"></script>
  <script type="text/javascript">
    jQuery(function ($) {
      $(".swipebox").swipebox();
    });
  </script>
  <!-- //swipe box js -->
     <!-- start-smooth-scrolling -->
  <script type="text/javascript" src="js/move-top.js"></script>
  <script type="text/javascript" src="js/easing.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({
          scrollTop: $(this.hash).offset().top
        }, 1000);
      });
    });
  </script>
  <!-- //end-smooth-scrolling -->
  <!-- smooth-scrolling-of-move-up -->
  <script type="text/javascript">
    $(document).ready(function () {
      /*
      var defaults = {
      	containerID: 'toTop', // fading element id
      	containerHoverID: 'toTopHover', // fading element hover id
      	scrollSpeed: 1200,
      	easingType: 'linear' 
      };
      */
      $().UItoTop({
        easingType: 'easeOutQuart'
      });
    });
  </script>
  <!-- //smooth-scrolling-of-move-up -->
</body>


</html>
        