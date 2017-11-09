@extends('layouts.headprofile') @section('title', 'profile') @section('content')
<style>
	hr {
		border-color: darkred;
	}
</style>
<link href="{{asset('css/profile/blogttc.css')}}" rel="stylesheet" type="text/css" />
<div class="container">
	<div class="blog-page blog-content-1">
		<div class="row">
			<div class="col-md-12" style="padding-top: 50px;">
				<h2>กิจกรรมของฉัน</h2>
				<div class="travelo-box">
					<div class="row">
						<div class="col-md-5 col-sm-5 col-xs-5" style="border-style:solid;border-width: 1px;padding-top:15px;">
							<h4>ประวัติการท่องเที่ยว</h4>
							<div class="image-box">
								<article class="box" style="padding-top: 50px; padding-left:0px;">
									<div class="row">
										<div class="col-md-4">
											<div class="text-center">
												<img src="/images/" alt="" width="350" alt="avatar">
											</div>
										</div>
										<div class="col-md-8">
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
													->orderBy ('triprounds.start_date' , 'asc')->get();
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
										</div>
								</article>
								<label class="price-wrapper">
									<span class="price-per-unit"> </span>
								</label>
								</div>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
							<div class="col-md-6 col-sm-6 col-xs-6" style="border-style:solid;border-width: 1px;padding-top:15px;">
								<h4>ทริปที่ได้ทำการจอง</h4>
								<div class="image-box">
									<article class="box" style="padding-top: 50px; padding-left:0px;">
										<div class="row">
											<div class="col-md-4">
												<div class="text-center">
													<img src="/images/" alt="" width="350" alt="avatar">
												</div>
											</div>
											<div class="col-md-8">
												<h4>
													<?php
									
									if($count>0){
										for($i=0;$i<$count;$i++){
													$tripname = DB::table('trips')
																									->select(['trips_name','triprounds.start_date','triprounds.departure_date','trips.id','booking.status'])
																									->join('triprounds','trips.id','=','triprounds.trip_id')
																									->join('booking','triprounds.id','=','booking.tripround_id')
																									->where('triprounds.id',$triproundbook[$i])
																									->orderBy ('triprounds.start_date' , 'asc') 
																									->limit(1)
             																			->get();
																									//cast([date] as datetime)
																									
                
													
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
										?>
												</h4>
											</div>
											<div class="col-md-12 text-center">
												<ul class="pagination pagination-lg pager" id="myPager"></ul>
											</div>
									</article>
									<label class="price-wrapper">
										<span class="price-per-unit"> </span>
									</label>

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