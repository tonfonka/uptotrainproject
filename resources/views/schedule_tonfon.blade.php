<html>

<head>
    <meta charset="utf-8">
    <title>Up To train</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{asset('/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- เปิดแล้ว Theme CSS -->
    <link href="{{asset('/css/uptotrain2.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
</head>

<body id="page-top" class="index">
    <div align="right">
        <a class="btn btn-primary" href={{ url( '/profileuser') }} style="
    padding-top: 12px;
    padding-bottom: 12px;
    padding-left: 15px;
    padding-right: 15px;background-color:#fff;border-color:#fff;
"><i class="fa fa-times" style="color:#000000;font-size:50px;"></i></a>
    </div>
    <!--<div class="container">-->
    <div class="container" id="about" align="center">
        <div class="row">
       
            <!-- Project Details Go Here -->
            <h1>{{ $trip->trips_name }}</h1>
            <!--<p class="item-intro text-muted">จังหวัด<br>โดย "$บริษัททัวร์"</p>-->
            @if($trip->trip_nnight > 0)
                                                            ระยะเวลา {{$trip->trip_nday}} วัน {{$trip->trip_nnight}} คืน
                                                            @else
                                                            ระยะเวลา {{$trip->trip_nday}} วัน
                                                            @endif
            
            <a href="/profileagency/{{$trip->travelagency_id}}"><p>บริษัท {{ $agen[0]->agency_name_en}}</p></a>
            <img class="img-responsive img-centered" src="/images/{{$trip->image}}" alt="">
            <p style="padding-top:20px;">{{$trip->trip_description}}</p>
            <br><br>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">แผนการเดินทางท่องเที่ยว</h2>
                        <h3 class="section-subheading text-muted">" ไปไหนบ้างนะ "</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="timeline">
                            <!--ถ้าเลขคู่ ตรง li จะเพิ่ม class='timeline-inverted'-->
                            @foreach($schedules as $schedule)
                            <div style="color:white;">
                                <h3>{{$loop->iteration}}</h3>
                            </div>
                            @if($loop->iteration %2 == 0)
                            <li class="timeline-inverted">
                                @else
                                <li>
                                    @endif
                                    <div class="timeline-image">
                                        <img class="img-circle img-responsive" src="/img/about/1.jpg" alt="">
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4>วันที่ {{ $schedule->schedule_day }} เวลา {{ $schedule->schedule_time }}</h4>
                                            <h4 class="subheading">{{ $schedule->schedule_place }}</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p class="text-muted">{{ $schedule->schedule_description }}</p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                
                        </ul>
                    </div>
                </div>
                <br><br>
                
                
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb"
        crossorigin="anonymous"></script>
    <!-- Contact Form JavaScript -->
    <script src="{{asset('js/jqBootstrapValidation.js')}}"></script>
    <!-- Theme JavaScript -->
    <script src="{{asset('js/agency.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/move-top.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/easing.js')}}"></script>
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