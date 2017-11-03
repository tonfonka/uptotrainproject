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
    <!-- Navigation -->
<nav id="mainNav" class="navbar  navbar-custom navbar-fixed-top">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
            <a class="navbar-brand page-scroll" href="#page-top">Up To Train</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

                <li>
                    <a class="page-scroll" href= "#services">How to Use</a>
                </li>

                <li>
                    <a href="/search">Search</a>
                </li>
                <li>
                    <a class="page-scroll" href="#portfolio">Highlight</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->
<header>
    <div class="container">
        <div class="intro-text">
        @if(Auth::guest())
            <div class="intro-heading">Welcome</div>
            

            <!-- laravel <a href="#services" class="page-scroll btn btn-xl">LOG IN</a>-->
            
            <div class="intro-lead-in">Are you looking for a Trip ?</div><br><br>
            <a href="{{ url('/login')}}" class="page-scroll btn btn-xl">LOG IN</a>
            @elseif(Auth::user()->role == 'user' )
            <div class="intro-heading">Welcome - {{Auth::user()->name}}</div>
            <div class="intro-lead-in">Are you looking for a Trip ?</div><br><br>
            
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="page-scroll btn btn-xl">
                       
                       LOG OUT
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @elseif(Auth::user()->role =='travel agency')
            <?php
                $agencyName = DB::table('travelagency')->where('user_id',Auth::user()->id)->get();
            ?>
            <div class="intro-heading">Welcome</div>
            <div class="intro-heading">{{$agencyName[0]->agency_name_en}}</div>
           
            <div class="intro-lead-in">Do you have a new trip to offer?</div><br><br>
               
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="page-scroll btn btn-xl">
                       
                       LOG OUT
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endif
        </div>
    </div>
</header>
        @yield('content')
    </body>
    <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright">Copyright &copy; Up to train</span>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                    <li><a href="#">Privacy Policy</a>
                    </li>
                    <li><a href="#">Terms of Use</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</html>