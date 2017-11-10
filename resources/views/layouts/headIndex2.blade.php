<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Up To train</title>
        <!-- Bootstrap Core CSS -->
        <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- เปิดแล้ว Theme CSS -->
        <link href="/css/uptotrain.min.css" rel="stylesheet">
    </head>

    <body id="page-top" class="index">
        @yield('content')
    </body>
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
</html>