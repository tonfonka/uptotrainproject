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
  <meta name="keywords" content="Holiday Spot Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
  <script type="application/x-javascript">
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);
    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!--Custom Theme files-->
  <link href="css/bootstrap2.css" type="text/css" rel="stylesheet">
  <link href="css/style.css" type="text/css" rel="stylesheet">
  <link href="css/profile/member-style.css" type="text/css" rel="stylesheet">

  <!-- font-awesome icons -->
  <link href="css/font-awesome.css" rel="stylesheet">
  <!-- //font-awesome icons -->
  <!-- js -->
  <script src="js/jquery-2.2.3.min.js"></script>
  <!-- //js -->
  <!-- web-fonts -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
    rel='stylesheet' type='text/css'>
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
        <h1><a href="index.html">Up To Train</a></h1>
      </div>

      <div class="topnav pull-right">
        <ul class="quick-menu pull-right clearfix">
          <li><a href="javascript:;">Go Go Company</a></li>
          <li><a href="/_member/logout.php">ออกจากระบบ</a></li>
        </ul>
      </div>
    </div>
    <div class="main-navigation">
      <div class="container">
        <nav id="main-menu" role="navigation">
          <ul class="menu">
            <li class="">
              <a href="/_member/home/th">
						หน้าหลัก 					  </a>
            </li>
            <li class="">
              <a href="/_member/reservation/th">
						ข้อมูลการจอง					  </a>
            </li>
            <li class="">
              <a href="/_member/report/th">
						รายงาน					  </a>
            </li>
            <li class="">
              <a href="/_member/setting/th">
						ตั้งค่า					  </a>
            </li>
          </ul>
          <div class="clearfix"> </div>
        </nav>
      </div>
    </div>
  </header>

  <!-- //header-->



  @yield('agency_banner')
 @yield('content')
  <!-- footer start here -->
  <div class="footer-agile" style="padding-top:20px;padding-bottom:20px;">
    <div class="container">
      <div class="footer-agileinfo">
        <div class="copy-right">
          <p>© UP TO TRAIN . All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank"> Winnie secret</a></p>
        </div>
      </div>
    </div>
    <!-- //footer end here -->
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
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
    <script src="js/search_tripUser/cbpViewModeSwitch.js" type="text/javascript"></script>
</body>

</html>