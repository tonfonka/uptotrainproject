@extends('layouts.layout') @section('content')

<!-- newedit About Section -->








<!--<section id="about" align="center"  padding-top= "50%">-->

<div align="right">
  <button type="button" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Close
            </button>
</div>
<!--<div class="container">-->
<div class="container" id="about" align="center">

  <div class="row">
    <div class="modal-body">
        <img class="img-responsive img-centered" src="/img/portfolio/trip1_00.jpg" alt="">
        @foreach($schedules as $schedule)

      <?php
            $trip = DB::table('trips')->where('id', $schedule->trip_id)->first();
            
            $tripround = DB::table('triprounds')->where('trip_id', $schedule->trip_id)->first();
            ?>
        <!-- Project Details Go Here -->
          <div class="modal-body">
        <h2>{{$trip->trips_name}}</h2>
        <!--<p class="item-intro text-muted">จังหวัด<br>โดย "$บริษัททัวร์"</p>-->
        <p>ระยะเวลา {{$trip->trip_nday}} วัน {{$trip->trip_nnight}} คืน</p>
        <p>{{$trip->trip_description}}</p>

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
                <!--ถ้าเลขคู่ ตรง li จะเพิ่ม class='timeline-inverted'-->

                <h3>{{$loop->iteration}}</h3>
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
                 
        </div>
                  </li>
</li>
@endforeach
  </div>

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

          <!--<ul class="list-inline">
                                    <li>Travel Agency: abc company</li>
                                    <li>Date: ?วัน ?คืน</li>
                                    <li>Cost: ? baht</li>
                                </ul>-->
          <!-- ADD table round -->

          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <ul class="list-inline">
                <table class="table">
                  <tr>
                    <th>รอบวันที่</th>
                    <th>ราคาผู้ใหญ่</th>
                    <th>ราคาเด็ก</th>
                    <th>จำนวนที่ว่าง</th>
                  </tr>
                  <!-- edit add loop select for db -->
                  <!---->
                </table>
                <!-- end loop -->
              </ul>
            </div>
            <div class="col-md-3"></div>
          </div>

          <button type="button" class="btn btn-primary" data-dismiss="modal" href={{url( '/search')}}>  <i class="fa fa-times"></i> Close This</button>
        </div>
       
    </div>
  </div>
</div>







<!--</section>-->

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

</body>

</html>

@endsection('content')