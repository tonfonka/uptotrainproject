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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">UP TO TRAIN</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a href="TravelAgency_home.html">H0ME</a>
                    </li>
                    <li>
                        <a href="trip_travelAgency.html">TRIP</a>
                    </li>
                    <li>
                        <a href="comment_TRIP.html">COMMENT</a>
                    </li>
                    <li>
                        <a href="#">  LOG OUT</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div class="container">
        <div class="col-lg-12">
            <h2 class="page-header">ทริปที่กำลังจะถึง</h2>
        </div>
    </div>


 
    <div class="container">

        @foreach($trips as $trip)
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-gift"></i>{{$trip->start_date}} - {{$trip->departure_date}}  </h4>
                </div>

                <div class="panel-body">
 
                    <a href="portfolio-item.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0"
                            aria-valuemax="100" style="width: 40%">
                            <span class="sr-only">10% Complete (success)</span> 10% BOOKING
                    </div>
                </div>
                <!-- Table -->
                <table class="table">
                    <tr>
                        <td>TRIP NAME</td>
                      
                        <td>{{$trip->trips_name}}</td>
                    </tr>
                    <tr>
                        <td>ที่นั้งทั้งหมด</td>
                        <td>{{$trip->amount_seats}} </td>
                    </tr>
                    <tr>
                        <td>TOTAL</td>
                        <td>0</td>

                    </tr>
                    <tr>
                        <td>
                            <a href="/show" ><button type="button" class="btn btn-primary">VIEW</button></a>
                            <input type="submit" class="btn btn-primary" value="CANCEL">

                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endforeach
    </div>
    










    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })
    </script>

</body>

</html>