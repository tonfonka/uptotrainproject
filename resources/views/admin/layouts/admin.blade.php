<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UP TO TRAIN</title>

  <!-- Bootstrap Core CSS -->
  <link href="{{asset('vendor/bootstrapAdmin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="{{asset('vendor/bootstrapAdmin/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{asset('/css/admin/sb-admin-2.css')}}" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="{{asset('vendor/bootstrapAdmin/morrisjs/morris.css')}}" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="{{asset('vendor/bootstrapAdmin/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">UP TO TRAIN</a>
      </div>
      <!-- /.navbar-header -->

      <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i>
            <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li>
              <a href="#">
                <i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-gear fa-fw"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="login.html">
                <i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
          </ul>
          <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
      </ul>
      <!-- /.navbar-top-links -->

      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">

            <li>
              <a href="/ad">
                <i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-comment fa-fw"></i> Message
                <span class="fa arrow"></span>
              </a>
              <ul class="nav nav-second-level">
                <li>

                  <a href="/messagenew">New</a>
                </li>
                <li>
                  <a href="/messageold">Old</a>

                </li>
              </ul>
              <!-- /.nav-second-level -->
            </li>
            <li>
              <a href="#">
                <i class="fa fa-paper-plane fa-fw"></i> Travel Agency
                <span class="fa arrow"></span>
              </a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="/approveagency">Apporve</a>
                </li>
                <li>
                  <a href="/agencymanage">Agency Manage</a>
                </li>
                <li>
                <a href="/sta">Statement</a>
                </li>
                <li>
                  <a href="/deny">Blacklist</a>
                </li>
              </ul>
              <!-- /.nav-second-level -->
            </li>
            <li>
              <a href="#">
                <i class="fa  fa-child fa-fw"></i> User
                <span class="fa arrow"></span>
              </a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="/usermanage">User Manage</a>
                </li>
                <li>
                  <a href="#">Blacklist</a>
                </li>
              </ul>
              <!-- /.nav-second-level -->
            </li>
            <li>
              <a href="#">
                <i class="fa  fa-child fa-fw"></i> Report
                <span class="fa arrow"></span>
              </a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="/reportcomment">Comment</a>
                </li>
                <li>
                  <a href="/trashcomment">Trash</a>
                </li>
              </ul>
              <!-- /.nav-second-level -->
            </li>


          </ul>
        </div>
        <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->
    </nav>
    @yield('content')


  </div>
  <!-- /#wrapper -->

  <!-- jQuery -->
  <script src="{{asset('vendor/bootstrapAdmin/jquery/jquery.min.js')}}"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{{asset('vendor/bootstrapAdmin/bootstrap/js/bootstrap.min.js')}}"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="{{asset('vendor/bootstrapAdmin/metisMenu/metisMenu.min.js')}}"></script>

  <!-- Morris Charts JavaScript -->
  <script src="{{asset('vendor/bootstrapAdmin/raphael/raphael.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrapAdmin/morrisjs/morris.min.js')}}"></script>
  <script src="{{asset('/js/admin/data/morris-data.js')}}"></script>

  <!-- Custom Theme JavaScript -->
  <script src="{{asset('/js/admin/sb-admin-2.js')}}"></script>

</body>

</html>