@extends('layouts.headprofile') @section('title', 'profile') @section('content')

<link href="{{asset('css/profile/blogttc.css')}}" rel="stylesheet" type="text/css"/>


<div class="container">
	<div class="blog-page blog-content-1">
		<div class="row">
			<div class="col-md-12" style="padding-top: 50px">
				<h2>กิจกรรมเมื่อเร็วๆนี้</h2>
				<div class="travelo-box">
					<div class="row">
						<div class="col-md-5 col-sm-5 col-xs-5" style="border: 2px solid red;
    border-radius: 25px;">
							<h4>เพิ่งไปล่าสุด</h4>
							<div class="image-box style14">
								<article class="box" style="padding-top: 50px; padding-left:0px;">
									<div class="details">
										<h4>
										<?php
										$triproundbook = DB::table('booking')
																				->select('tripround_id')
																				->where('user_id',Auth::user()->id)
																				->pluck('tripround_id');
										$tripbook = DB::table('booking')->where('user_id',Auth::user()->id)->get();
										$user = DB::table('users')->where('id',Auth::user()->id)->first(); 
										$count = $triproundbook->count();	
										$today = date("Y-m-d");  
									if($count>0){
										for($i=0;$i<$count;$i++){
													$tripname = DB::table('trips')
													->select(['trips.id','trips_name','triprounds.start_date','triprounds.departure_date','trips.id','booking.status'])
													->join('triprounds','trips.id','=','triprounds.trip_id')
													->join('booking','triprounds.id','=','booking.tripround_id')
													->where('triprounds.id',$triproundbook[$i])
													->orderBy ('triprounds.start_date' , 'asc')
													->get();
													if(($tripname[0]->start_date)<=$today){
																									
														echo '<a href="/schedules/'.$tripname[0]->id.'">'.($tripname[0]->trips_name).'</a><br>';
													echo "วันเริ่มเดินทาง : ".date('d/m/Y', strtotime($tripname[0]->start_date))."<br>";
													echo "วันสิ้นสุดการเดินทาง : ".date('d/m/Y', strtotime($tripname[0]->departure_date))."<br>";
													echo '<a href="/paysum/'.$tripbook[$i]->id.'">'."จำนวนคนที่จอง : ".($tripbook[$i]->number_booking).'</a><br>';
													echo "วันเวลาที่จอง : ".date('d/m/Y', strtotime($tripbook[$i]->booking_time)).'&nbsp'.date('h:i a', strtotime($tripbook[$i]->booking_time))."<br>"; 
													echo '<a href="/comment/'.$tripname[0]->id.'">'.'review Trip'.'</a><br>';
													echo "<hr>";
												}
																								
										}
									}
									else
										echo "ไม่มีรายการ";
										?>
										</h4>
										<!-- {{$triproundbook}}<br>--> 
									
										<label class="price-wrapper"><span class="price-per-unit">  </span></label>
									</div>
								</article>
							</div>
						</div>
<div class="col-md-1 col-sm-1 col-xs-1"></div>
						
						<div class="col-md-6 col-sm-6 col-xs-6" style="border-style: groove;">
					
							<h4>กำลังไปเร็วๆนี้</h4>
							<div class="image-box style14">
								<article class="box" style="padding-top: 0px; padding-left:0px;">
									<div class="details">
										<h4 >	
										<?php
									
									if($count>0){
										for($i=0;$i<$count;$i++){
													$tripname = DB::table('trips')
																									->select(['trips_name','triprounds.start_date','triprounds.departure_date','trips.id','booking.status'])
																									->join('triprounds','trips.id','=','triprounds.trip_id')
																									->join('booking','triprounds.id','=','booking.tripround_id')
																									->where('triprounds.id',$triproundbook[$i])
																									->orderBy ('triprounds.start_date' , 'asc')
																									//cast([date] as datetime)
																									->get();
													
													if(($tripname[0]->start_date)>=$today){
														
														
													
														
														echo '<a href="/schedules/'.$tripname[0]->id.'">'."ชื่อทริป : ".($tripname[0]->trips_name).'</a><br>';												
													echo "วันเริ่มเดินทาง : ".date('d/m/Y', strtotime($tripname[0]->start_date))."<br>";
												  echo "วันสิ้นสุดการเดินทาง : ".date('d/m/Y', strtotime($tripname[0]->departure_date))."<br>";
													echo '<a href="/paysum/'.$tripbook[$i]->id.'">'."จำนวนคนที่จอง : ".($tripbook[$i]->number_booking).'</a><br>';
													echo "วันเวลาที่จอง : ".date('d/m/Y', strtotime($tripbook[$i]->booking_time)).'&nbsp'.date('h:i a', strtotime($tripbook[$i]->booking_time))."<br>";
													echo "สถานะการจอง : ";
													if($tripname[0]->status != 'success'){
														echo "การจองไม่สำเร็จ";
													}else{
															echo "จ่ายเงินสำเร็จแล้ว";
													}
												
													echo "<br>";
													echo "<hr>";
												}
																								
										}
									}
									else
										echo "ไม่มีรายการ";
										?></h4>
										<label class="price-wrapper"><span class="price-per-unit">  </span></label>
									</div>
								</article>
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
<script>
$(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
});
</script>
@endsection