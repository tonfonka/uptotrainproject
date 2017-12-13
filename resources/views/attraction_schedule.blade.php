@extends('layouts.headIndex') @section('title', 'Search Trip') @section('tripuser')
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
                    @foreach($tripname as $name) ชื่อทริป {{$name->trips_name}}

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
  </div>
</div>
@endsection