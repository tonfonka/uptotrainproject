<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Up To train - @yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type="application/x-javascript">
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);
    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!--Custom Theme files-->
  <link href="{{ URL::asset('/css/bootstrap2.css') }}" type="text/css" rel="stylesheet">
  <link href="{{ URL::asset('/css/style.css') }}" type="text/css" rel="stylesheet">
  <link href="{{ URL::asset('/css/profile/member-style.css') }}" type="text/css" rel="stylesheet">

  <!-- font-awesome icons -->
  <link href="{{ URL::asset('/css/font-awesome.css') }}" rel="stylesheet">
  <!-- //font-awesome icons -->
  <!-- js -->

  <script src="{{ URL::asset('js/jquery-2.2.3.min.js') }}"></script>

  <!-- //js -->
  <!-- web-fonts -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link href="//fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
</head>

<body>
  <!-- banner -->
  <header id="header" class="navbar-static-top style6">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
          aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
        <h1><a href="home">Up To Train</a></h1>
      </div>

      <div class="topnav pull-right">
        <ul class="quick-menu pull-right clearfix">
          <li><a href="javascript:;">{{$travelagencies->agency_name_en}}</a></li>
          <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        LOG OUT
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                {{ csrf_field() }}
            </form></li>
        </ul>
      </div>
    </div>
    <div class="main-navigation">
      <div class="container">
        <nav id="main-menu" role="navigation">
          <ul class="menu">
            <li class="">
              <a href="/agency">
						หน้าหลัก 					  </a>
            </li>
            <li class="">
              <a href="/addtrip">
						เพิ่มทริป					  </a>
            </li>
            <li class="">
              <a href="">
						ทริปทั้งหมด					  </a>
            </li>
            <li class="">
              <a href="/profileagencysetting">
						ตั้งค่า					  </a>
            </li>
          </ul>
          <div class="clearfix"> </div>
        </nav>
      </div>
    </div>
  </header>


  <!-- //header-->



  @yield('content')
  
  <!-- footer start here -->
  <div class="footer-agile">
    <div class="container">
      <div class="footer-agileinfo">
        <div class="col-md-5 col-sm-5 footer-wthree-grid">
          <div class="agileits-w3layouts-tweets">
            <h5><a href="index.html">Up To Train</a></h5>
            
          </div>
          <p>เว็บไซต์ที่รวบรวมทริปท่องเที่ยวโดยรถไฟภายในประเทศไทย เชิญคุณพบกับประสบการณ์ใหม่ๆโดยการท่องเที่ยวโดยรถไฟ</p>
        </div>
        <div class="col-md-3 col-sm-3 footer-wthree-grid">
          <h3>Quick Links</h3>
          <ul>
          <li><a href="home"><span class="glyphicon glyphicon-menu-right"></span> Home</a></li>
          <li><a href="agreement"><span class="glyphicon glyphicon-menu-right"></span> Agreement</a></li>
          <li><a href="search"><span class="glyphicon glyphicon-menu-right"></span> Search</a></li>
          <li><a href="profileuser"><span class="glyphicon glyphicon-menu-right"></span> Profile</a></li>
          
        </ul>
        </div>
        <div class="col-md-4 col-sm-4 footer-wthree-grid">
          <!--<h3>Contact Info</h3>
          <ul>
            <li>123 Broome St,2nd Block</li>
            <li>NY 10002, New York</li>
            <li>Phone: +01 111 222 3333</li>
            <li><a href="mailto:info@example.com"> mail@example.com</a></li>
          </ul>-->
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="copy-right">
        <p>© 2017 Holiday Spot . All rights reserved | Design by UP TO TRAIN</a></p>
      </div>
    </div>
  </div>
  <!-- //footer end here -->
  <!-- swipe box js -->
  <script src="{{ asset('js/jquery.swipebox.min.js') }}"></script>

  <script type="text/javascript">
    jQuery(function ($) {
      $(".swipebox").swipebox();
    });
  </script>
  <!-- //swipe box js -->
  <!-- start-smooth-scrolling -->
  <script type="text/javascript" src="{{ asset('js/move-top.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>
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
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  
</body>

</html>

