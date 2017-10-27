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
                                            <h4>วันที่ {{ $schedule->schedule_day }} เวลา {{date('H:m', strtotime($schedule->schedule_time))}} น.</h4>
                                            <h4 href="" class="subheading">{{ $schedule->schedule_place }}</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p class="text-muted">{{ $schedule->schedule_description }}</p>
                                        </div>
                                    </div>
                                </li>
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
                                <tr align="center">
                                    <th>วันที่เดินทาง</th>
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
                                    <td>{{date('d/m/Y', strtotime($tripround->start_date ))}}</td>
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

    <!-- Trip Modal 1 -->
<!-- แก้ -->

<div class="portfolio-modal modal fade" id="tripModal1" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <h2>เขื่อนป่าสักชลสิทธิ</h2>
                        <p class="item-intro text-muted">เที่ยว 1 วัน ชิวๆกับรถไฟไทย<br>by abc company</p>
                        <img class="img-responsive img-centered" src="img/portfolio/trip1_00.jpg" alt="">
                        <p>ทริปเที่ยวเพลินๆ 1 วันชิวๆ</p>

                        <br><br>

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h2 class="section-heading">Schedule</h2>
                                    <h3 class="section-subheading text-muted">" ไปไหนบ้างนะ "</h3>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-image">
                                                <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4>06.30-7.10</h4>
                                                    <h4 class="subheading">สถานีรถไฟหัวลำโพง</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    <p class="text-muted">พร้อมกันที่สถานีรถไฟกรุงเทพ โดยมีเจ้าหน้าที่ของบริษัทฯ คอยให้การต้อนรับและอำนวยความสะดวกก่อนเดินทาง</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-inverted">
                                            <div class="timeline-image">
                                                <img class="img-circle img-responsive" src="img/about/2.jpg" alt="">
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4>10.00-10.40</h4>
                                                    <h4 class="subheading">รถไฟลอยน้ำ</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    <p class="text-muted">ขบวนรถหยุด 40 นาที นำนักท่องเที่ยวชมทิวทัศน์และถ่ายภาพบริเวณ “เหนือเขื่อนป่าสักชลสิทธิ์”
                                                        พร้อมชม “รถไฟลอยน้ำ”</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-image">
                                                <img class="img-circle img-responsive" src="img/about/3.jpg" alt="">
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4>11.30-12.30</h4>
                                                    <h4 class="subheading">ร้านอาหารน่านน้ำป่าสัก</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    <p class="text-muted">บริการอาหารกลางวัน ณ ร้านน่านน้ำป่าสัก</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-inverted">
                                            <div class="timeline-image">
                                                <img class="img-circle img-responsive" src="img/about/4.jpg" alt="">
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4>12.30-14.50</h4>
                                                    <h4 class="subheading">เขื่อนป่าสักชลสิทธิ์</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    <p class="text-muted">ท่องเที่ยวบริเวณเขื่อนป่าสักชลสิทธิ์<br>o เพลิดเพลินกับวิถีชีวิตชุมชนไทยเบิ้ง
                                                        เป็นกลุ่มชนพื้นถิ่นที่ตั้งบ้านเรือนอยู่บริเวณลุ่มน้ำป่าสัก ในพื้นที่อำเภอพัฒนานิคม
                                                        อำเภอโคกสำโรง อำเภอสระโบสถ์ และอำเภอชัยบาดาล จังหวัดลพบุรี ชาวไทยเบิ้ง
                                                        มีขนบธรรมเนียมประเพณีและวัฒนธรรมคล้ายกลุ่มชนไทยภาคกลาง แต่ยังมีภาษา
                                                        ความเชื่อ เพลงพื้นบ้าน การละเล่น การทอผ้า ที่เป็นเอกลักษณ์ของกลุ่มชนอยู่
                                                        <br>o ชมพิพิธภัณฑ์การก่อสร้างเขื่อนป่าสักและโครงการพัฒนาลุ่มแม่น้ำป่าสักในพระราชดำริ
                                                        <br>o นั่งรถตัวหนอนชมสันเขื่อน
                                                        <br>o นั่งรถม้า ชื่นชมฟาร์มแพะ ฟาร์มแกะ
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-inverted">
                                            <div class="timeline-image">
                                                <h4>Booking
                                                    <br><br>Now!
                                                </h4>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <br><br>

                            <ul class="list-inline">
                                <li>Travel Agency: abc company</li>
                                <li>Date: 1 July 2017</li>
                                <li>Cost: 500 baht</li>
                            </ul>

                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close This</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Trip Unknow Modal 1 -->

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