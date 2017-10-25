@extends('layouts.headprofile') @section('title', 'profile') @section('content')

<link href="css/profile/blogttc.css" rel="stylesheet" type="text/css">
<div class="container">


	<div class="clearfix"></div>
	<div class="blog-page blog-content-1">
		<div class="row">
			<h2>กิจกรรมเมื่อเร็วๆนี้</h2>
			<div class="travelo-box">
				<div class="table-responsive text-center" style="font-family:Prompt;">

					<table class="table">
						<thead>
							<tr>
								<th class="text-center" style="width:380px;">ชื่อทริป</th>
								<th class="text-center">จำนวนวัน</th>
								<th class="text-center">จำนวนคืน</th>
								<th class="text-center">รายละเอียด</th>
							</tr>
						</thead>

						<tr class="">
							<td>rrr</td>
							<td>ww</td>
							<td>www</td>
							<td>eee</td>
						</tr>

					</table>
				</div>
				<!--<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<h4>เพิ่งไปล่าสุด</h4>
							<div class="image-box style14">
								<article class="box" style="padding-top: 50px; padding-left:50px;">
									<div class="details">
										
										
										<h4>
										</h4>
										<!-- {{$triproundbook}}<br> 
									
										<label class="price-wrapper"><span class="price-per-unit">  </span></label>
									</div>
								</article>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
					
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
																									->get();
													
													if(($tripname[0]->start_date)>=$today){
														
														
														echo "ชื่อทริป : ";
														
														echo '<a href="/schedules/'.$tripname[0]->id.'">'.($tripname[0]->trips_name).'</a><br>';												
													echo "วันเริ่มเดินทาง : ".($tripname[0]->start_date)."<br>";
												echo "วันสิ้นสุดการเดินทาง : ".($tripname[0]->departure_date)."<br>";
													echo "จำนวนคนที่จอง : ".($tripbook[$i]->number_booking)."<br>";

													echo "สถานะการจอง : ";
													if($tripname[0]->status != 'success'){
														echo "กรุณาจ่ายเงิน";
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
					</div>-->
			</div>
		</div>
	</div>
</div>
</div>
@endsection