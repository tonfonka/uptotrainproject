<html>

<head>
    <meta charset="utf-8">
    <title>Up To train</title>
    <!-- Bootstrap Core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- เปิดแล้ว Theme CSS -->
    <link href="/css/uptotrain2.min.css" rel="stylesheet">
   
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
</head>
<body id="page-top" class="index">
    <div align="right">
        <a class="btn btn-primary" href={{ url( '/search') }} style="
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
            ระยะเวลา {{ $trip->trip_nday }} วัน {{ $trip->trip_nnight }} คืน
            @else
            ระยะเวลา {{ $trip->trip_nday }} วัน
            @endif
            <p>บริษัท {{ $agen[0]->agency_name_en}}</p>
            <img class="img-responsive img-centered" style="height:500px;width:850px;" src="/images/{{$trip->image}}" alt="">
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
                                <img class="img-circle img-responsive" style="" src="/img/about/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>วันที่ {{ $schedule->schedule_day }} เวลา {{date('H:m', strtotime($schedule->schedule_time))}} น.</h4>
                                    <h4><a  data-toggle="modal" href="#betaModal">{{ $schedule->schedule_place }}</a></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">{{ $schedule->schedule_description }}</p>
                                </div>
                            </div>
                            <!-- Modal -->
                                <div class="modal fade" id="betaModal" role="dialog">
                                    <div class="modal-dialog">
                                    <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">{{ $schedule->schedule_place }}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row-fluid">
                                                    <div class="span12">
                                                        <div class="span6">
                                                        <div class="logowrapper">
                                                            <img style="height:380px;width:485px;" src="/img/about/1.jpg" alt="App Logo"/>
                                                        </div>
                                                    </div>
                                                    <div class="span6">
                                                        <hr>
                                                        <p class="help-block">Name</p>
                                                        <p class="help-block">Email</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!--end Modal-->
                            @endforeach
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <h4>Booking</h4>
                                    <h4>now</h4>
                                </div>
                            </li>
                        </ul>
                    </div> 
                </div>
                <br><br>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3 class="section-subheading text-muted">ตารางราคา</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-9">
                        <ul class="list-inline">
                            <table class="table">
                                <tr>
                                    <th>กำหนดการเดินทาง</th>
                                    <th>ราคาผู้ใหญ่</th>
                                    <th>ราคาเด็ก</th>
                                    <th>จำนวนที่นั่งว่าง</th>
                                    <th>จำนวนที่นั่ง</th>
                                    <th></th>
                                </tr>
                                <!-- edit add loop select for db -->
                                @foreach($triprounds as $tripround)
                                <?php
                                    $amount =  $tripround->amount_seats;
                                    $tid=$tripround->id;
                                    $seat = DB::table('booking')->where([['tripround_id',$tid],['status','=','success']])->sum('number_booking');
                                    $sum = $amount-$seat;
                                ?>
                                <tr align="center">
                                    <td>{{date('d/m/Y', strtotime($tripround->start_date ))}} - {{date('d/m/Y', strtotime($tripround->departure_date ))}} </td>
                                    <td>{{$tripround->price_adult}}</td>
                                    <td>{{$tripround->price_child}}</td>
                                    <td>{{$sum}} </td>
                                    <td>{{$amount}}</td>
                                    <td><a class="btn btn-primary" href="/booking/{{$tripround->id}}" name="{{$tid}}">จองเลย</a></td>
                                </tr>
                                @endforeach
                            </table>
                            <!-- end loop -->
                        </ul>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

<div class="container">
<div class="row">
<div class="col-sm-12">
<h3>รีวิวจากผู้เข้าร่วมจริง</h3>
</div><!-- /col-sm-12 -->
</div><!-- /row -->
<div class="row">
@foreach($review as $reviews)
<?php
    $userName = DB::table('users')->where('id',$reviews->user_id)->get();

?>
<div class="col-sm-1">
<div class="thumbnail">
<img class="img-responsive user-photo" src="/images/{{$userName[0]->image}}">
</div><!-- /thumbnail -->
</div><!-- /col-sm-1 -->

<div class="col-sm-5">
<div class="panel panel-default">
<div class="panel-heading">
<strong>{{$userName[0]->name}}</strong> <span class="text-muted">commented 5 days ago</span>
</div>
<div class="panel-body">
{{$reviews->rate_des}}
</div><!-- /panel-body -->
</div><!-- /panel panel-default -->
</div><!-- /col-sm-5 -->
@endforeach
</div><!-- /row -->

</div><!-- /container -->

    <!-- jQuery -->
    <script src="/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb"
        crossorigin="anonymous"></script>
    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>
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

</body>

</html>