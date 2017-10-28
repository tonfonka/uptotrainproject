@extends('layouts.headprofile') @section('title', 'profile') @section('content')

<link href="css/profile/blogttc.css" rel="stylesheet" type="text/css">
<!--<div class="container">


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
				</div>-->
			<div class="container">
	<div class="blog-page blog-content-1">
		<div class="row">
			<div class="col-md-9" style="padding-top: 50px">
				<h2>กิจกรรมเมื่อเร็วๆนี้</h2>
				<div class="travelo-box">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6">
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
										?></h4>
										<!-- {{$triproundbook}}<br>--> 
									
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
			<!--<div class="sidebar col-md-3">
				<div class="travelo-box book-with-us-box">
					<h4>ค้นหาการเดินทางครั้งใหม่</h4>
					<ul>
						<li>
							<i class="soap-icon-hotel-1 circle blue-color"></i>
							<h5 class="title"><a href="/hotel" target="_blank">
									ค้นหาโรงแรมที่ดีที่สุด</a></h5>
						</li>
						<li>
							<i class="icon soap-icon-plane-right takeoff-effect yellow-color circle"></i>
							<h5 class="title"><a href="/restuarant" target="_blank">
									ค้นหาร้านอาหารสุดคุ้ม</a></h5>
						</li>
						<li>
						<i class="icon soap-icon-plane circle red-color"></i>
							<i class="soap-icon-places circle red-color"></i>
							 <h5 class="title"><a href="/trips" target="_blank">
									ทริปยอดนิยม</a></h5>
						</li>
						<li>
							<i class="soap-icon-beach circle green-color"></i>
							 <h5 class="title"><a href="/thailandtrips" target="_blank">
									ทริปในประเทศสุดชิล</a></h5>
						</li>
					</ul>
				</div>
			</div>-->
		
			</div>
		</div>
	</div>
</div>
</div>
@endsection