@extends('layouts.layout') @section('content')
<!-- Navigation -->
<nav id="mainNav" class="navbar  navbar-custom navbar-fixed-top">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">Up To Train</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="#services">How to Use</a>
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
            <div class="intro-lead-in">Are you looking for a Trip ?</div>
            <br>
            <br>
            <a href="{{ url('/login')}}" class="page-scroll btn btn-xl">LOG IN</a>
            @elseif(Auth::user()->role == 'user' )
            <div class="intro-heading">Welcome - {{Auth::user()->name}}</div>
            <div class="intro-lead-in">Are you looking for a Trip ?</div>
            <br>
            <br>
            <a href="{{ url('/profileuser') }}" class="page-scroll btn btn-xl">
                My profile
            </a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
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

                <div class="intro-lead-in">Do you have a new trip to offer?</div>
                <br>
                <br>
                <a href="{{ url('/agency') }}" class="page-scroll btn btn-xl">
                    My profile
                </a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
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
<!-- Services Section -->
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="/agreement">
                    <h2 class="section-heading">How to Use</h2>
                    <h3 class="section-subheading text-muted">แนะนำวิธีการใช้เบื้องต้น</h3>
                </a>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">Booking</h4>
                <p class="text-muted">จองง่ายๆแค่เพียงปลายนิ้ว</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-calendar-times-o fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">Canceller</h4>
                <p class="text-muted">ยกเลิกก่อน 7 วัน</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">Refund</h4>
                <p class="text-muted">รับประกันการคืนเงิน</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Search</h2>
                <h3 class="section-subheading text-muted">" มองหาทริปอยู่ใช่ไหม? "</h3>
                <a href="search">
                    <button type="submit" class="btn btn-xl">Search Now!</button>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Grid -->
<section class="bg-light" id="portfolio">
    <div class="container ">
        <div class="row">
            <div class="col-lg-12 text-center" style="padding-bottom:30px;">
                <h2 class="section-heading">Highlight Trip</h2>
            </div>
        </div>
        <div class="row">
            <div class="row">
                @foreach($trips as $t)
                <div class="col-md-4 col-sm-3 portfolio-item">
                    <a class="portfolio-link" href="#tripModalUnknow{{$t->id}}" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <div class="pattern">
                            <img src="images/{{$t->image}}" alt="Tattoo &amp; Piercing" width="350" height="250" style="display: block; border: 0;">
                        </div>
                    </a>
                    <div class="portfolio-caption">
                        <h4>{{ $t->trips_name }}</h4>
                        <p class="text-muted">{{$t->trip_province}}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
@foreach($trips as $t)
<div class="portfolio-modal modal fade" id="tripModalUnknow{{$t->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">

                    <div class="modal-body">
                        <!-- Project Details Go Here -->
                        <h1>{{ $t->trips_name }}</h1>
                        @if($t->trip_nnight > 0)
                        <p class="item-intro text-muted">ระยะเวลา {{ $t->trip_nday }} วัน {{ $t->trip_nnight }} คืน</p>
                        @else
                        <p class="item-intro text-muted">ระยะเวลา {{ $t->trip_nday }} วัน</p>
                        @endif
                        <p class="item-intro text-muted">จังหวัด{{$t->trip_province}}</p>
                        <p class="item-intro text-muted">จำนวนมื้ออาหาร {{$t->trip_meal}} มื้อ</p>

                        <img class="img-responsive img-centered" style="height:400px;width:750px;" src="/images/{{$t->image}}" alt="">
                        <p class="text-muted" style="padding-top:20px;">{{$t->trip_description}}</p>
                        <br>
                        <br>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                            <i class="fa fa-times"></i> Close This</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach
<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Contact Us</h2>
                <h3 class="section-subheading text-muted">ติดต่อพวกเราได้โดยกรอกแบบฟอร์มด้านล่าง แล้วพวกเราจะรีบตอบกลับอย่างเร่งด่วน</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button type="submit" class="btn btn-xl">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>






<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb"
    crossorigin="anonymous"></script>

<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="js/agency.min.js"></script>

@endsection