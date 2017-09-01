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
                  <input type="number" name="number_children" id="number_children" min="0" max={{$sum}} value="0" onchange="myChildren()" onclick="mySummy()">                  ราคา :: {{$triprounds->price_child}}
                  <h3 id="pchild"></h3>

                   จำนวนผู้ใหญ่
                  <input type="number" name="number_adults" id="number_adults" min="0" max={{$sum}} value="0" onchange="myAdult()" onclick="mySummy()">                  
                  ราคา :: {{$triprounds->price_adult}} 

                  <h3 id="padult"></h3>
                  สถานะการจอง : <h3 id="summary"></h3>
                  <h3>ที่นั่งว่าง :: {{$sum}} /จำนวนที่นั่งทั้งหมด :: {{$triprounds->amount_seats}}</h3>
                  <h4>
                  จำนวนคนจองทั้งหมด : 
                  <!-- //<p id="number_booking"  ></p>  -->
                  <input type="number"  id="number_booking" name="number_booking" >

                  </h4>
                  <br>
                    
                  <h4>ราคารวมทั้งหมด :
                  <!-- <p id="total_cost"></p>  -->
                   <input type="number"  id="total_cost" name="total_cost"  >
                  </h4>
                    <br>
                   <button type="submit" class="btn btn-primary">จองตอนนี้</button>
                </form>
               
            
          </div>
        
          <div class="col-md-3"></div>
        </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
<script>
  function myChildren() {
    var x = document.getElementById("number_children").value;
    var y = {{$triprounds->price_child}};
    document.getElementById("pchild").innerHTML = "ราคารวมเด็กทั้งหมด" + x * y+"บาท";
  }

  function myAdult() {
    var x = document.getElementById("number_adults").value;
    var y = {{$triprounds->price_adult}};
    document.getElementById("padult").innerHTML = "ราคารวมผู้ใหญ่ทั้งหมด" + x * y+"บาท";
  }

  function mySummy() {
    var a = document.getElementById("number_children").value;
    var b = document.getElementById("number_adults").value;
    var c = {{$triprounds->price_adult}};
    var d = {{$triprounds->price_child}};
    var nsum = (a * d) + (b * c);
    var e = {{ $sum}};
    var np = parseInt(a) + parseInt(b);
    if (np > e) {
      document.getElementById("summary").innerHTML = "กรุณากรอกจำนวนคนใหม่";
    }else if(np == e) {
      document.getElementById("summary").innerHTML = "เต็มแล้ว";
    }
    else {
      document.getElementById("summary").innerHTML = "OK";
      //document.getElementById("number_booking").innerHTML = np; 
      document.getElementById("number_booking").value = np;
      //document.getElementById("total_cost").innerHTML = nsum;
      document.getElementById("total_cost").value = nsum;
    }
  }
</script>
<script src="vendor/jquery/jquery.min.js"></script>

<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
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

</body>


</html>