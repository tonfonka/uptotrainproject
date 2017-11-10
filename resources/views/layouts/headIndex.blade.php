<html>

<head>
  <title>Up To train - @yield('title')</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap Core CSS -->
  <link href="{{ URL::asset('/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet"/>

  <!-- Custom Fonts -->
   <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
 

  <!--Theme CSS-->
  <link href="{{ URL::asset('/css/uptotrain2.min.css') }}" rel="stylesheet" />


  <link href="{{ URL::asset('/css/style.css') }}" type="text/css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="{{ URL::asset('/css/swipebox.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/css/ziehharmonika.css') }}">
  <!-- //Custom Theme files -->
  <!-- font-awesome icons -->
  <link href="{{ URL::asset('/css/font-awesome.css') }}" rel="stylesheet">
  <!-- //font-awesome icons -->
  <!-- js -->
  <script src="{{ URL::asset('/js/jquery-2.2.3.min.js') }}"></script>
  <!-- //js -->
  <!-- web-fonts -->

  <link href="//fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

</head>

<body>
  <!-- banner -->
  <div class="banner about-banner" style="background-image:{{ URL::asset('/img/2.jpg') }}">
    <div class="header agileinfo-header">
      <!-- header -->
      <nav id="mainNav" class="navbar-inverse navbar-custom2 navbar-fixed-top">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
            <a class="navbar-brand page-scroll" href="/">Up To Train</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right" style="padding-top:0px;">
              <li>
                <a href="/agreement">Agreement</a>
              </li>
              <li>
                <a href="/search">Search</a>
              </li>
                @if(Auth::guest())
                  <li><a href="{{ url('/login')}}" class="page-scroll btn btn-xl">LOG IN</a></li>
                @elseif(Auth::user()->role == 'user' )
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="/profileuser">My profile</a></li>
                    <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">LOG OUT</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    </li>
                  </ul>
                </li>
                @elseif(Auth::user()->role =='travel agency')
                <?php
                    $agencyName = DB::table('travelagency')->where('user_id',Auth::user()->id)->get();
                ?>
               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{$agencyName[0]->agency_name_en}} <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="/agency">My profile</a></li>
                    <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">LOG OUT</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    </li>
                  </ul>
                </li>
                @endif
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
            <h5><a href="home">Up To Train</a></h5>
            
          </div>
          <p>เว็บไซต์ที่รวบรวมทริปท่องเที่ยวโดยรถไฟภายในประเทศไทย เชิญคุณพบกับประสบการณ์ใหม่ๆโดยการท่องเที่ยวโดยรถไฟ</p>
        </div>
        <div class="col-md-3 col-sm-3 footer-wthree-grid">
          <h3>Quick Links</h3>
          <ul>
            <li><a href="home"><span class="glyphicon glyphicon-menu-right"></span> Home</a></li>
            <li><a href="agreement"><span class="glyphicon glyphicon-menu-right"></span> Agreement</a></li>
            <li><a href="search"><span class="glyphicon glyphicon-menu-right"></span> Search</a></li>
            <ul class="dropdown-menu">
            @if(Auth::guest())
           <li><a href="{{ url('/login')}}"><span class="glyphicon glyphicon-menu-right"></span> Login</a></li>
            @else
            <li><a href="profile"><span class="glyphicon glyphicon-menu-right"></span>welcome</a></li>
            <li> <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="glyphicon glyphicon-menu-right">
                       Logout
            </a></li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endif
            </ul>
          </ul>
        </div>
        <div class="col-md-4 col-sm-4 footer-wthree-grid">
         
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
  <!-- jQuery -->
<script src="/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb"
    crossorigin="anonymous"></script>
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
  <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/vendor/tether/tether.min.js')}}"></script>
    <script src="{{asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  
 
</body>

</html>