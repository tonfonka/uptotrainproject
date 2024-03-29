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


	<!-- Custom Theme files -->
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
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
	<!-- //web-fonts -->
</head>

<body>
	<!-- banner -->
	<div class="banner about-banner" style="background-image:url('img/2.jpg')">
		<div class="header agileinfo-header">
			<!-- header -->
			<nav class="navbar navbar-default">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
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
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-left">
							<li><a href="home" class="w3ls-hover">Home</a></li>
							<li><a href="about.html" class="btn w3ls-hover">Trips</a></li>
							<li><a href="about.html" class="btn w3ls-hover">Tours</a></li>
							<li><a href="tours.html" class="btn w3ls-hover">Railway</a></li>
							<li><a href="contact.html" class="btn w3ls-hover">Contact</a></li>
							<li><a href="#" class="dropdown-toggle btn w3ls-hover" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User <span class="caret"></span></a>
								<ul class="dropdown-menu">
								@if(Auth::guest())
            <a href="{{ url('/login')}}" class="page-scroll btn btn-xl">LOG IN</a>
            @else
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="page-scroll btn btn-xl">
                        LOG OUT
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endif
									<!-- <li><a href="icons.html">Profile</a></li>
									<li><a href="codes.html">Log Out</a></li> -->
								</ul>
							</li>
						</ul>

						<div class="clearfix"> </div>
					</div>
					<!-- //navbar-collapse -->
				</div>
				<!-- //container-fluid -->
			</nav>
		</div>
		<!-- //header -->
		<div class="banner-text">
			<div class="container">
				<div class="banner-w3lstext">
					<h2>Let's Have Fun With Train </h2>
				</div>
			</div>
		</div>
	</div>


	@yield('content')



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
					</ul>
				</div>
				<div class="clearfix"> </div>-->
			</div>
			<div class="copy-right">
				<p>© 2017 Holiday Spot . All rights reserved | Design by UP TO TRAIN</a></p>
			</div>
		</div>
	</div>
	<!-- //footer end here -->
	<!-- swipe box js -->
	<script src="/js/jquery.swipebox.min.js"></script>
	<script type="text/javascript">
		jQuery(function ($) {
			$(".swipebox").swipebox();
		});
	</script>
	<!-- //swipe box js -->
	<!-- start-smooth-scrolling -->
	<script type="text/javascript" src="/js/move-top.js"></script>
	<script type="text/javascript" src="/js/easing.js"></script>
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

</body>

</html>