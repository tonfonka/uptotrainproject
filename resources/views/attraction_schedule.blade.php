<html>

<head>
  <meta charset="utf-8">
  <title>Up To train</title>
  <!-- Bootstrap Core CSS -->
  <link href="{{asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
  <!-- Custom Fonts -->
  <link href="{{asset('/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- เปิดแล้ว Theme CSS -->
  <link href="{{asset('/css/uptotrain2.min.css')}}" rel="stylesheet" />
</head>

<body id="page-top" class="index">
  <div align="right">
    <a class="btn btn-primary" href={{ url( '/search') }} style="
    padding-top: 12px;
    padding-bottom: 12px;
    padding-left: 15px;
    padding-right: 15px;background-color:#fff;border-color:#fff;
">
      <i class="fa fa-times" style="color:#000000;font-size:50px;"></i>
    </a>
  </div>
  <div class="container" id="about" align="center">
    <div class="row">
      <h1>{{$attraction->attraction_Name}}</h1>
      <p class="item-intro text-muted">อำเภอ {{$attraction->Attraction_tambon}} จังหวัด {{$attraction->Attraction_Province}}</p>
      <img class="img-fluid d-block mx-auto" width="500" height="350" src="/images/attraction/{{$attraction->Attraction_pic}}"
        alt="">
      <div class="col-lg-12 mx-auto">
        <div class="well w3l">
          <p class="text-muted2">{{$attraction->attraction_Description}}</p>
        </div>
        @if($attraction->goByCar && $attraction->goByBus)
        <p class="text-muted3">วิธีการเดินทาง</p>
        <p class="text-muted2">
          <strong>เดินทางโดยรถส่วนตัว :</strong> {{$attraction->goByCar}}</p>
        <p class="text-muted2">
          <strong>เดินทางโดยรถโดยสาร :</strong> {{$attraction->goByBus}}</p>
        @elseif($attraction->goByCar)
        <p class="text-muted3">วิธีการเดินทาง</p>
        <p class="text-muted2">
          <strong>เดินทางโดยรถส่วนตัว :</strong> {{$attraction->goByCar}}</p>
        @elseif($attraction->goByBus)
        <p class="text-muted3">วิธีการเดินทาง</p>
        <p class="text-muted2">
          <strong>เดินทางโดยรถโดยสาร :</strong> {{$attraction->goByBus}}</p>
        @endif
        <p class="text-muted2">เวลาเปิดทำการ : {{$attraction->attraction_Time_Open}}</p>
        <p class="text-muted2">เวลาปิดทำการ : {{$attraction->Attraction_Time_Closed}}</p>
        <p class="text-muted2">เบอร์โทรศัพท์ติดต่อ : {{$attraction->Attraction_Tel}}</p>

        <?php
                        $trip = DB::table('schedules')
                                                  ->where('schedules.schedule_place','like','%'.$attraction->attraction_Name.'%')
                                                  ->get();
                        $tripcount = $trip->count();
 
                        ?>
          @if($tripcount >0) @foreach($trip as $tr)

          <?php
                          $tripname = DB::table('trips')->where('id',$trip[0]->trip_id)->get();


                         ?>
            @foreach($tripname as $name)

            <p class="text-muted2">ชื่อทริป {{$name->trips_name}}</p>

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
                  </section>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close</button>
              </div>
            </div>
      </div>
    </div>
  </div>
</body>