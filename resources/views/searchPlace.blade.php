@extends('layouts.headIndex') @section('title', 'Search Place') @section('content')
<style>
  body {
    padding: 0 !important
  }
</style>
<!-- Page Content -->
<div class="welcome about" style="padding-top:0px;padding-bottom:0px;">
  <div class="container" align="center">
    <!-- search panel -->
    <div class="newsletter">
      <div class="container">
        <h3 class="agileits-title">Search Attraction</h3>
        <form action="searchp" method="post" role="searchp">
          {{ csrf_field() }}
          <input type="text" name="a" placeholder="Enter destination..." required="">
          <input type="submit" value="search">
          <div class="clearfix"> </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('/vendor/tether/tether.min.js')}}"></script>
  <script src="{{asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
</div>
@endsection @section('tripuser')
<section class="bg-light" id="portfolio">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-right" style="padding-bottom:30px;">
        <h4 class="section-heading">{{$place->total()}} total places</h4>
        <h4>In this page {{$place->count()}} places</h4>
      </div>
    </div>
    <section class="bg-light" id="portfolio">
      <div class="container">
        @foreach($place as $p)
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal{{$p->attraction_ID}}">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fa fa-plus fa-3x"></i>
              </div>
            </div>
            <!--<img class="img-fluid" src="img/portfolio/04-thumbnail.jpg" alt="">-->
            <img src="/images/attraction/{{$p->Attraction_pic}}" alt="Tattoo &amp; Piercing" width="350" height="250" style="display: block; border: 0;"
            />
          </a>
          <div class="portfolio-caption">
            <h4>{{str_limit($p->attraction_Name, $limit = 35, $end = '....')}} </h4>
            <p class="text-muted">{{$p->Attraction_Province}}</p>
          </div>
        </div>
        @endforeach @foreach($place as $p)
        <!-- Modal 1 -->
        <div class="portfolio-modal modal fade" id="portfolioModal{{$p->attraction_ID}}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                  <div class="rl"></div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-12 mx-auto">
                    <div class="modal-body">
                      <!-- Project Details Go Here -->
                      <h2>{{$p->attraction_Name}}</h2>
                      <p class="text-muted2">อำเภอ {{$p->Attraction_tambon}} จังหวัด {{$p->Attraction_Province}}</p>
                      <img class="img-fluid d-block mx-auto" width="500" height="350" src="/images/attraction/{{$p->Attraction_pic}}" alt="">
                      <div class="col-lg-12 mx-auto">
                        <div class="well w3l">
                          <p class="text-muted2">{{$p->attraction_Description}}</p>
                        </div>
                        @if($p->goByCar && $p->goByBus)
                        <p class="text-muted3">วิธีการเดินทาง</p>
                        <p class="text-muted2">
                          <strong>เดินทางโดยรถส่วนตัว :</strong> {{$p->goByCar}}</p>
                        <p class="text-muted2">
                          <strong>เดินทางโดยรถโดยสาร :</strong> {{$p->goByBus}}</p>
                        @elseif($p->goByCar)
                        <p class="text-muted3">วิธีการเดินทาง</p>
                        <p class="text-muted2">
                          <strong>เดินทางโดยรถส่วนตัว :</strong> {{$p->goByCar}}</p>
                        @elseif($p->goByBus)
                        <p class="text-muted3">วิธีการเดินทาง</p>
                        <p class="text-muted2">
                          <strong>เดินทางโดยรถโดยสาร :</strong> {{$p->goByBus}}</p>
                        @endif
                        <p class="text-muted2">เวลาเปิดทำการ : {{$p->attraction_Time_Open}}</p>
                        <p class="text-muted2">เวลาปิดทำการ : {{$p->Attraction_Time_Closed}}</p>
                        <p class="text-muted2">เบอร์โทรศัพท์ติดต่อ : {{$p->Attraction_Tel}}</p>
                        <?php
                        $trip = DB::table('schedules')
                                                  ->where('schedules.schedule_place','like',$p->attraction_Name)
                                                  ->get();
                        $tripcount = $trip->count();
 
                        ?>
                          @if($tripcount >0) @foreach($trip as $tr)

                          <?php
                          $tripname = DB::table('trips')->where('id',$trip[0]->trip_id)->get();


                         ?>
                            @foreach($tripname as $name) 
                            
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p class="text-muted3">ชื่อทริป {{$name->trips_name}}</p>
                        
                    </div>
                </div>
                           

                            <div class="row" style ="font-family:Prompt;">
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

                                    <?php
                          $tripround = DB::table('triprounds')->where('trip_id',$trip[0]->trip_id)->get();

                         ?>
                                      @foreach($tripround as $round)
                                      <?php
                                    $amount =  $round->amount_seats;
                                    $tid=$round->id;
                                    $seat = DB::table('booking')->where([['tripround_id',$tid],['status','=','success']])->sum('number_booking');
                                    $sum = $amount-$seat;
                                    $today = date('y/m/d'); 
                                    $tid = $round->id;
                                    //dd($today); 
                                ?>
                                        @if( ($today)
                                        < ($round->start_date ))
                                          <tr>
                                            <td>{{$round->start_date }} - {{$round->departure_date}} </td>
                                            <td>{{$round->price_child}}</td>
                                            <td>{{$round->price_adult}}</td>
                                            <td>{{$round->amount_seats}}</td>
                                            <td>{{$sum}}</td>
                                            <td>
                                              <a class="btn btn-primary" href="/booking/{{$round->id}}" name="{{$tid}}">จองเลย</a>
                                            </td>
                                          </tr>
                                          @endif @endforeach @endforeach @endforeach @endif
                                  </table>
                                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                                    <i class="fa fa-times"></i>
                                    Close</button>
                              </div>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
    </section>
    </div>

    <div align="center">
      {{$place->links()}}
    </div>


</section>

@endsection