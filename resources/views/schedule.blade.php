<html>

<head>
    <meta charset="utf-8">
    <title>Up To train</title>
    <!-- Bootstrap Core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Custom Fonts -->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- เปิดแล้ว Theme CSS -->
    <link href="/css/uptotrain2.min.css" rel="stylesheet"/>
   <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet"/>

   

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['คะแนนความพึ่งพอใจ', 'Hours per Day'],
            ['1 ดาว',{{$one}}],
            ['2 ดาว',{{$two}}],
            ['3 ดาว',{{$three}}],
            ['4 ดาว',{{$four}}],
            ['5 ดาว',{{$five}}],
        ]);
        var options = {
            
          title: 'คะแนนรวม จากผู้ใช้ทั้งหมด' ,
          pieHole: 0.5,
          slices: {
            0: { color: '#febf05' },
            1: { color: '#feae40' },
            2: { color: '#fe8005' },
            3:{color:'#fe9505'},
            4:{color:'#fe5705'},
          }
          
          
        };
        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
    
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
    <div class="container" id="about" align="center">
        <div class="row">
            <!-- Project Details Go Here -->
            <h1>{{$trip->trips_name}}</h1>
            @if($trip->trip_nnight > 0)
            <p class="item-intro text-muted">ระยะเวลา {{ $trip->trip_nday }} วัน {{ $trip->trip_nnight }} คืน</p>
            @else
            <p class="item-intro text-muted">ระยะเวลา {{ $trip->trip_nday }} วัน</p>
            @endif
            <p class="item-intro text-muted">จังหวัด{{$trip->trip_province}}</p>
          <p class="item-intro text-muted">จำนวนมื้ออาหาร {{$trip->trip_meal}} มื้อ</p>
            <a href="/profileagency/{{$trip->travelagency_id}}"><p class="item-intro text-muted">บริษัท {{ $agen[0]->agency_name_en}}</p></a>
            <img class="img-responsive img-centered" style="height:400px;width:750px;" src="/images/{{$trip->image}}" alt="">
            <p class="text-muted" style="padding-top:20px;">{{$trip->trip_description}}</p>
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
                                
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    @if($schedule->schedule_day == 1)
<h4>เวลา {{date('H:m', strtotime($schedule->schedule_time))}} น.</h4>
                                    @else
                                    <h4>วันที่ {{ $schedule->schedule_day }} เวลา {{date('H:m', strtotime($schedule->schedule_time))}} น.</h4>
                                    @endif
                                    <!-- <h4><a  data-toggle="modal" data-target="#betaModal{{$schedule->id}}" href="{{$schedule->id}}">{{ $schedule->schedule_place }}</a></h4>-->
                                    <h4>{{ $schedule->schedule_place }}</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">{{ $schedule->schedule_description }}</p>
                                   
                                </div>
                            </div>
                            
                            @endforeach

                            @foreach($schedules as $schedule)
                            
                            <!-- Modal -->
                                <div class="modal fade" id="betaModal{{$schedule->id}}" role="dialog">
                                    <div class="modal-dialog">
                                    <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
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
                                                    </div>
                                                    <div class="span6">
                                                        <hr>
                                                        <p class="help-block">Name {{ $schedule->schedule_place }}</p>
                                                        
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
                                <div class="timeline-image2">
                                    <h4>Booking</h4>
                                    <h4>now</h4>
                                </div>
                            </li>
                        </ul>
                    </div> 
                </div>
                <br><br>
                <br><br>
                <?php
                $pic = DB::table('imagegallery')->where('trip_id',$trip->id)->get();
            
            ?>
           
<section class="bg-light" id="portfolio">

            <div class="row">
               <div class="portfolio-caption">
                        <h2>gallery</h2>
             

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css'>
<style class="cp-pen-styles">img { max-height: 100% }
.swiper-container {
       
        height: 500px;
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
      
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      /*width:90%;*/ 
    }</style></head><body>
<!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
        @foreach($pic as $ps)  
            <div class="swiper-slide"><img src="/images/{{$ps->image}}" alt="Tattoo &amp; Piercing" width="650" height="450" style="display: block; border: 0;" ></div>
            @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js'></script>
<script >var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
  spaceBetween: 0,
        //loop: true,
autoplay: 2500,
        autoplayDisableOnInteraction: false,
        slidesPerView: 4,
        coverflow: {
            rotate: 30,
        
           
            modifier: 1,
           
        }
    });
//# sourceURL=pen.js
</script>

        </section>
       <br><br>



                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">ตารางราคา</h2>
                        
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
                                    $today = date('y/m/d'); 
                                    //dd($today); 
                                ?>
                                    @if( ($today) < (date('Y/m/d', strtotime($tripround->start_date ))))
                                <tr align="center">
                                    <td>{{date('d/m/Y', strtotime($tripround->start_date ))}} - {{date('d/m/Y', strtotime($tripround->departure_date ))}} </td>
                                    <td>{{$tripround->price_adult}}</td>
                                    <td>{{$tripround->price_child}}</td>
                                    <td>{{$sum}} </td>
                                    <td>{{$amount}}</td>
                                    <td><a class="btn btn-primary" href="/booking/{{$tripround->id}}" name="{{$tid}}">จองเลย</a></td>
                                </tr>
                                @endif
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


@if($alluser>0)
<div class="container">
<div class="row">
<div class="col-sm-12">
<h3>รีวิวจากผู้เข้าร่วมจริงทั้งหมด : {{$alluser}} คน</h3>
</div><!-- /col-sm-12 -->
</div><!-- /row -->
<div class="row">
<div id="donutchart" style="width: 900px; height: 500px;"></div>
@foreach($review as $reviews)
<?php
    $userName = DB::table('users')->where('id',$reviews->user_id)->get();
?>

@isset($reviews->rate_des)
<div class="col-sm-1">
    <div class="thumbnail">
        <img class="img-responsive user-photo" src="/images/{{$userName[0]->image}}">
    </div><!-- /thumbnail -->
</div><!-- /col-sm-1 -->
    <?php
    $due = $reviews->updated_at;
    ?>
<div class="col-sm-5">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>{{$userName[0]->name}}</strong> <span class="text-muted">     {{\Carbon\Carbon::now('Asia/Bangkok')->createFromFormat('Y-m-d H:i:s', $due)->diffForHumans() }}</span>
            <span style="float:right;">  
            @if(($reviews->rate) =='1')
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            @elseif(($reviews->rate) =='2')
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            @elseif(($reviews->rate) =='3')
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            @elseif(($reviews->rate) =='4')
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            @elseif(($reviews->rate) =='5')
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            @endif
            </span>
        </div>
        <div class="panel-body">
        {{$reviews->rate_des}}

        </div><!-- /panel-body -->

    </div><!-- /panel panel-default -->
</div><!-- /col-sm-5 -->
@endisset
@endforeach
</div><!-- /row -->

</div><!-- /container -->

@else

@endif

    <!-- jQuery -->
    <script src="/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

   
</body>

</html>