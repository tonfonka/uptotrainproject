<html>

<head>
  <title>Up To train - @yield('title')</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" re l="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!--Theme CSS-->
  <link href="css/uptotrain2.min.css" rel="stylesheet">


  <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="css/swipebox.css">
  <link rel="stylesheet" href="css/ziehharmonika.css">
  <!-- //Custom Theme files -->
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
        <link href="css/bootstrap2.css" type="text/css" rel="stylesheet" media="all">
    <![endif]-->
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


  @yield('content') 
  @yield('tripuser')
  @yield('schedule')

  <!-- footer start here -->
  <div class="footer-agile">
    <div class="container">
      <div class="footer-agileinfo">
        <div class="col-md-5 col-sm-5 footer-wthree-grid">
          <div class="agileits-w3layouts-tweets">
            <h5><a href="index.html">Up To Train</a></h5>
            <div class="social-icon footerw3ls">
              <a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a>
            </div>
          </div>
          <p>เว็บไซต์ที่รวบรวมทริปท่องเที่ยวโดยรถไฟภายในประเทศไทย เชิญคุณพบกับประสบการณ์ใหม่ๆโดยการท่องเที่ยวโดยรถไฟ</p>
        </div>
        <div class="col-md-3 col-sm-3 footer-wthree-grid">
          <h3>Quick Links</h3>
          <ul>
            <li><a href="index.html"><span class="glyphicon glyphicon-menu-right"></span> Home</a></li>
            <li><a href="about.html"><span class="glyphicon glyphicon-menu-right"></span> About</a></li>
            <li><a href="tours.html"><span class="glyphicon glyphicon-menu-right"></span> Tours</a></li>
            <li><a href="codes.html"><span class="glyphicon glyphicon-menu-right"></span> Short Codes</a></li>
            <li><a href="contact.html"><span class="glyphicon glyphicon-menu-right"></span> Contact</a></li>
          </ul>
        </div>
        <div class="col-md-4 col-sm-4 footer-wthree-grid">
          <h3>Contact Info</h3>
          <ul>
            <li>123 Broome St,2nd Block</li>
            <li>NY 10002, New York</li>
            <li>Phone: +01 111 222 3333</li>
            <li><a href="mailto:info@example.com"> mail@example.com</a></li>
          </ul>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="copy-right">
        <p>© 2017 Holiday Spot . All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank"> Winnie Secret.</a></p>
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
  <script src="js/bootstrap2.js"></script>
</body>

</html>