<html>

<head>
  <title>Up To train - @yield('title')</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap Core CSS -->
  <link href="{{ URL::asset('/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />

  <!-- Custom Fonts -->
  <link href="{{ URL::asset('/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
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
  <div class="banner about-banner" style="background-image:{{ URL::asset('/img/2.jpg') }}">
    <div class="header agileinfo-header">
      <!-- header -->
      <nav id="mainNav" class="navbar-inverse navbar-custom2 navbar-fixed-top">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span> Menu
              <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="/">Up To Train</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right" style="padding-top:0px;">

              <li>
                <a href="/agreement">Agreement</a>
              </li>
              <li>
                <a href="/search">Search</a>
              </li>
              @if(Auth::guest())
              <li>
                <a href="{{ url('/login')}}" class="page-scroll btn btn-xl">LOG IN</a>
              </li>
              @elseif(Auth::user()->role == 'user' )
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{Auth::user()->name}}<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="/profileuser">My profile</a>
                  </li>
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
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
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{$agencyName[0]->agency_name_en}}<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                      <a href="/agency">My profile</a>
                    </li>
                    <li>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">LOG OUT</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </li>
                  </ul>
                </li>
                @endif
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


  <!-- swipe box js -->
  <script src="{{asset('/js/jquery.swipebox.min.js')}}"></script>
  <script type="text/javascript">
    jQuery(function ($) {
      $(".swipebox").swipebox();
    });
  </script>
  <!-- //swipe box js -->
  <!-- start-smooth-scrolling -->
  <script type="text/javascript" src="{{asset('/js/move-top.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/easing.js')}}"></script>
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
 <script src="{{ asset('/js/jquery-2.2.3.min.js') }}"></script>

</body>

</html>