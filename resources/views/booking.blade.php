<html>

<head>
  <title>Up To train - Booking</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap Core CSS -->
  <link href="/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="/vendor/font-awesome/css/font-awesome.min.css" re l="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!--Theme CSS-->
  <link href="/css/uptotrain2.min.css" rel="stylesheet">


  <link href="/css/style.css" type="text/css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="/css/swipebox.css">
  <link rel="stylesheet" href="/css/ziehharmonika.css">
  <!-- //Custom Theme files -->
  <!-- font-awesome icons -->
  <link href="/css/font-awesome.css" rel="stylesheet">
  <!-- //font-awesome icons -->
  <!-- js -->
  <script src="/js/jquery-2.2.3.min.js"></script>
  <!-- //js -->
  <!-- web-fonts -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
    rel='stylesheet' type='text/css'>
  <link href="//fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
</head>
<body>
  <!-- banner -->
  <div class="banner about-banner" style="background-image:url('img/2.jpg')">
    <div class="header agileinfo-header">
      <!-- header -->
      <nav id="mainNav" class="navbar-inverse navbar-custom2 navbar-fixed-top">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
            <a class="navbar-brand page-scroll" href="#page-top">Up To Train</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right" style="padding-top:0px;">

              <li>
                <a href="#services">Agreement</a>
              </li>
              <li>
                <a href="#about">Search</a>
              </li>
              <li>
                <a href="#portfolio">Highlight</a>
              </li>
              <li>
                <a href="#team">Railway</a>
              </li>
              <li>
                <a href="#contact">Contact</a>
              </li>
            </ul>

          </div>
        </div>
        <!-- /.container-fluid -->
      </nav>
    </div>
    <!-- //header -->
    <div class="banner-text">
      <div class="container">
        <div class="banner-w3lstext" style="padding-top:74px;">
          <h2>Let's Have Fun With Train </h2>
        </div>
      </div>
    </div>
  </div>
  <div class="welcome about">
    <div class="container" align="center">
      <div class="row">
        @foreach($trip as $trips)
        <div>
          <h2>{{$trips->trips_name}}</h2>
          <h5>{{$trips->trip_nday}}วัน {{$trips->trip_nnight}}คืน</h5>
          <p>จังหวัด{{$trips->trip_province}}</p>
          <p>{{$trips->trip_meal}}มื้อ</p>
          <img class="img-responsive img-centered" src="/img/portfolio/trip1_00.jpg" alt="">
          <p></p>
        </div>
        @endforeach
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <ul class="list-inline">
              <?php
                    if($count == 0){
                        $sum = $triprounds->amount_seats;
                    }
                    else if($count > 0 ){
                        $amount =  $triprounds->amount_seats;
                        $nbooking  = $bookings[0]->number_booking;
                        $sum = $amount-$nbooking;
                    }      
                    ?>
                <form>
                  รอบวันที่ {{$triprounds->start_date}} - {{$triprounds->departure_date}}
                  <br> จำนวนเด็ก
                  <input type="number" name="number_children" id="number_children" min="0" max={{$sum}} value="0" onchange="myChildren()" onclick="mySummy()">                  ราคา :: {{$triprounds->price_child}} ยอดรวมเด็ก
                  <p id="pchild"></p>

                  <br> จำนวนผู้ใหญ่
                  <input type="number" name="number_adults" id="number_adults" min="0" max={{$sum}} onchange="myAdult()" onclick="mySummy()">                  ราคา :: {{$triprounds->price_adult}} ยอดรวมผู้ใหญ่
                  <p id="padult"></p>
                  สถานะการจอง
                  <p id="summary"></p>
                  ที่นั่งว่าง :: {{$sum}} /จำนวนที่นั่งทั้งหมด :: {{$triprounds->amount_seats}}
                </form>
            </ul>
          </div>
          <div class="col-md-3"></div>
        </div>
        <a href="/bookingsum">
                <button type="button" class="btn btn-primary" data-dismiss="modal" href={{url( '/bookingsum')}}>  <i class="fa fa-bookmark"></i> จองตอนนี้</button>
                </a>
        <div class="full-width bg-white">
          <div class="container">
            <div class="col-sm-5 col-xs-12 clearpd">
              <div id="price_info">
                <h2 class="booking-info" style="">โปรดระบุจำนวนผู้เดินทาง</h2>
                <div class="full-width" style="">
                  <div class="col-sm-12 box booking-passenger font-txt">
                    <p class="booking-passenger"><strong>ผู้ใหญ่/เด็ก (บาท/ท่าน)</strong></p>
                    <div class="full-width">
                      <div class="row">
                        <label class="col-xs-3 price-txt">พักคู่</label>
                        <div class="col-xs-4 col-md-3">
                          <div class="input-group ">
                            <span class="btn input-group-addon num-pax" onclick="sub_num_pax('tpr_price_1ATwin_HT',2)"> - </span>
                            <input type="text" name="num_tpr_price_1ATwin_HT" class="form-control text-center num-pax" min="0" value="0" disabled="">
                            <span class="btn input-group-addon num-pax" onclick="add_num_pax('tpr_price_1ATwin_HT',2)"> + </span>
                          </div>
                        </div>
                        <label class="col-xs-5 col-md-6 price-txt">฿ 50,900</label>
                        <input type="hidden" name="price_tpr_price_1ATwin_HT" value="50900">
                      </div>
                      <div class="row">
                        <label class="col-xs-3 price-txt">พักเดี่ยว</label>
                        <div class="col-xs-4 col-md-3">
                          <div class="input-group ">
                            <span class="btn input-group-addon num-pax" onclick="sub_num_pax('tpr_price_1ASingle_HT',1)"> - </span>
                            <input type="text" name="num_tpr_price_1ASingle_HT" class="form-control text-center num-pax" min="0" value="0" disabled="">
                            <span class="btn input-group-addon num-pax" onclick="add_num_pax('tpr_price_1ASingle_HT',1)"> + </span>
                          </div>
                        </div>
                        <label class="col-xs-5 col-md-6 price-txt">฿ 60,800</label>
                        <input type="hidden" name="price_tpr_price_1ASingle_HT" value="60800">
                      </div>
                      <div class="row">
                        <label class="col-xs-3 price-txt">พักสาม</label>
                        <div class="col-xs-4 col-md-3">
                          <div class="input-group ">
                            <span class="btn input-group-addon num-pax" onclick="sub_num_pax('tpr_price_3A_HT',3)"> - </span>
                            <input type="text" name="num_tpr_price_3A_HT" class="form-control text-center num-pax" min="0" value="0" disabled="">
                            <span class="btn input-group-addon num-pax" onclick="add_num_pax('tpr_price_3A_HT',3)"> + </span>
                          </div>
                        </div>
                        <label class="col-xs-5 col-md-6 price-txt">฿ 50,900</label>
                        <input type="hidden" name="price_tpr_price_3A_HT" value="50900">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 box font-txt">
                    <p class="booking-passenger"><strong>เด็กพักกับผู้ใหญ่ (บาท/ท่าน)</strong></p>
                    <div class="full-width">
                      <div class="row hidden">
                        <label class="col-xs-3 price-txt">เด็ก</label>
                        <div class="col-xs-4 col-md-3">
                          <div class="input-group ">
                            <span class="btn input-group-addon num-pax" onclick="sub_num_pax('tpr_price_1A1C_HT',1)"> - </span>
                            <input type="text" name="num_tpr_price_1A1C_HT" class="form-control text-center num-pax" min="0" value="0" disabled="">
                            <span class="btn input-group-addon num-pax" onclick="add_num_pax('tpr_price_1A1C_HT',1)"> + </span>
                          </div>
                        </div>
                        <label class="col-xs-5 col-md-6 price-txt">฿ 52,900</label>
                        <input type="hidden" name="price_tpr_price_1A1C_HT" value="52900">
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-md-12 customer-not-select" style="">
                  <span class="ch_without_ad alert-danger hidden" style="padding: 0px 5px;">เด็กต้องเดินทางกับผู้ใหญ่อย่างน้อย 1 ท่าน</span>
                </div>
              </div>
              <div class="col-xs-12 col-md-12 customer-select" style="display: none;">
                <div class="col-xs-1 input-group booking-passenger">
                  <button type="button" class="btn full-width" onclick="reset_price(0,0)">
                <span class="glyphicon glyphicon-repeat"> เริ่มต้นคำนวณใหม่ </span>
              </button>
                </div>
              </div>
            </div>
            <div class="col-sm-7 col-xs-12 font-txt row-margin-b clearpd">
              <div id="summary_selected" class="">
                <!-- <h2 class="booking-info">&nbsp;</h2> -->
                <div class="full-width">
                  <div class="col-xs-12 box">
                    <div class="row row-odd row-title">
                      <label class="col-xs-6"><strong>รายการที่ท่านเลือก</strong></label>
                      <label class="col-xs-3 text-center"><strong>จำนวน (คน)</strong></label>
                      <label class="col-xs-3 text-right"><strong>ราคา (บาท)</strong></label>
                    </div>
                    <div class="row item-selected" style="display: none;">
                      <label class="col-xs-6">ผู้ใหญ่ หรือ เด็ก พักห้องคู่</label>
                      <label name="num_tpr_price_1ATwin_HT" class="col-xs-3 text-center num_tpr_price_1ATwin_HT">-</label>
                      <label name="sum_tpr_price_1ATwin_HT" class="col-xs-3 text-right sum_tpr_price_1ATwin_HT">-</label>
                    </div>
                    <div class="row item-selected" style="display: none;">
                      <label class="col-xs-6">ผู้ใหญ่พักเดี่ยว</label>
                      <label name="num_tpr_price_1ASingle_HT" class="col-xs-3 text-center num_tpr_price_1ASingle_HT">-</label>
                      <label name="sum_tpr_price_1ASingle_HT" class="col-xs-3 text-right sum_tpr_price_1ASingle_HT">-</label>
                    </div>
                    <div class="row item-selected" style="display: none;">
                      <label class="col-xs-6">ผู้ใหญ่ 3 ท่าน พักห้องเดียวกัน</label>
                      <label name="num_tpr_price_3A_HT" class="col-xs-3 text-center num_tpr_price_3A_HT">-</label>
                      <label name="sum_tpr_price_3A_HT" class="col-xs-3 text-right sum_tpr_price_3A_HT">-</label>
                    </div>
                    <div class="row item-selected" style="display: none;">
                      <label class="col-xs-6">เด็กเตียงเสริม พักกับผู้ใหญ่ 2 ท่าน</label>
                      <label name="num_tpr_price_2A1Cbed_HT" class="col-xs-3 text-center num_tpr_price_2A1Cbed_HT">-</label>
                      <label name="sum_tpr_price_2A1Cbed_HT" class="col-xs-3 text-right sum_tpr_price_2A1Cbed_HT">-</label>
                    </div>
                    <div class="row item-selected" style="display: none;">
                      <label class="col-xs-6">เด็กไม่มีเตียงเสริม พักกับผู้ใหญ่ 2 ท่าน</label>
                      <label name="num_tpr_price_2A1CNobed_HT" class="col-xs-3 text-center num_tpr_price_2A1CNobed_HT">-</label>
                      <label name="sum_tpr_price_2A1CNobed_HT" class="col-xs-3 text-right sum_tpr_price_2A1CNobed_HT">-</label>
                    </div>
                    <div class="row row-odd-2">
                      <h4 class="col-xs-6 textwhite">คำนวณราคาโดยประมาณ</h4>
                      <h4 class="col-sm-3 col-xs-2 text-center textwhite"><span class="total-pax">-</span></h4>
                      <h4 class="col-sm-3 col-xs-4 text-right textwhite"><span class="total-price">-</span></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div>
              <div id="price-condition" class="col-sm-7 text-condition">
                <ul class="b">
                  <li>ราคาด้านบนเป็นราคาการคำนวณโดยประมาณเท่านั้น</li>
                  <li>เงื่อนไขการเข้าพักสำหรับผู้ใหญ่ 3 ท่านต่อห้อง เป็นไปตามข้อกำหนดของโรงแรม รวมถึงนโยบายเรื่องเตียงเสริม อาจไม่สามารถให้บริการได้ในบางเมือง
                    บางประเทศ</li>
                  <li>เงื่อนไขเด็กเตียงเสริม พักกับผู้ใหญ่ 2 ท่าน เป็นไปตามข้อกำหนดของโรงแรม รวมถึงนโยบายเรื่องเตียงเสริม อาจไม่สามารถให้บริการได้ในบางเมือง
                    บางประเทศ</li>
                  <li>ทางเจ้าหน้าที่จะทำการยืนยันราคา การเข้าพัก และ จำนวนห้องพักตามนโยบายของโรงแรมแต่ละแห่งผ่านใบแจ้งชำระเงินที่เป็นทางการอีกครั้ง</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  

</body>
<script>
    function myChildren() {
      var x = document.getElementById("number_children").value;
      var y = {
        {
          $triprounds - > price_child
        }
      };
      document.getElementById("pchild").innerHTML = "ราคารวมเด็กทั้งหมด" + x * y;
    }

    function myAdult() {
      var x = document.getElementById("number_adults").value;
      var y = {
        {
          $triprounds - > price_adult
        }
      };
      document.getElementById("padult").innerHTML = "ราคารวมผู้ใหญ่ทั้งหมด" + x * y;
    }

    function mySummy() {
      var a = document.getElementById("number_children").value;
      var b = document.getElementById("number_adults").value;
      var c = {
        {
          $triprounds - > price_adult
        }
      };
      var d = {
        {
          $triprounds - > price_child
        }
      };
      var nsum = (a * d) + (b * c);
      var e = {
        {
          $triprounds - > amount_seats
        }
      };
      console.log(e);

      var np = parseInt(a) + parseInt(b);
      if (np > e) {
        document.getElementById("summary").innerHTML = "กรุณากรอกจำนวนคนเกิน";
      } else {
        document.getElementById("summary").innerHTML = " ราคารวมทั้งหมด" + nsum + "จำนวนคนทั้งหมด" + np + "OK";
      }

    }
  </script>
</html>