@extends('layouts.headprofile') @section('title', 'profile') @section('content')
<style>
	hr {
		border-color: darkred;
	}
</style>
<link href="{{asset('css/profile/blogttc.css')}}" rel="stylesheet" type="text/css" />
<style>

.card .card-image{
    overflow: hidden;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    -o-transform-style: preserve-3d;
    transform-style: preserve-3d;
}

.card .card-image img{
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    -ms-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.card .card-image:hover img{
    -webkit-transform: scale(1.2) rotate(-7deg);
    -moz-transform: scale(1.2) rotate(-7deg);
    -ms-transform: scale(1.2) rotate(-7deg);
    -o-transform: scale(1.2) rotate(-7deg);
    transform: scale(1.2) rotate(-7deg);
}

.card{
    font-family: 'Prompt', sans-serif; 
    margin-top: 10px;
    position: relative;
    -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  -moz-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  box-shadow: 4 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
}

.card .card-content {
    padding: 10px;    
}

.card .card-content .card-title, .card-reveal .card-title{
    font-size: 24px;
    font-weight: 200;    
}

.card .card-action{
    padding: 20px;
    border-top: 1px solid rgba(160, 160, 160, 0.2);
}
.card .card-action a{
    font-size: 15px;
    color: #ffab40;
    text-transform:uppercase;
    margin-right: 20px;    
    -webkit-transition: color 0.3s ease;
    -moz-transition: color 0.3s ease;
    -o-transition: color 0.3s ease;
    -ms-transition: color 0.3s ease;
    transition: color 0.3s ease;
}
.card .card-action a:hover{    
    color:#ffd8a6;
    text-decoration:none;
}

.card .card-reveal{    
    padding: 20px;
    position: absolute;
    background-color: #FFF;
    width: 100%;
    overflow-y: auto;
    /*top: 0;*/
    left:0;
    bottom:0;
    height: 100%;
    z-index: 1;
    display: none;    
}

.card .card-reveal p{
    color: rgba(0, 0, 0, 0.71);
    margin:20px ;
}

.btn-custom{
    background-color: transparent;
    font-size:18px;
}

</style>

<div class="container">
	<!--<div class="blog-page blog-content-1">
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
											<!-- {{$triproundbook}}<br>
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
	</div>-->


     <?php
				if($count>0){
					for($i=0;$i<$count;$i++){
						$tripname = DB::table('trips')
							->select(['trips_name','triprounds.start_date','triprounds.departure_date','trips.id','booking.status'])
							->join('triprounds','trips.id','=','triprounds.trip_id')
							->join('booking','triprounds.id','=','booking.tripround_id')
							->where('triprounds.id',$triproundbook[$i])
							->orderBy ('triprounds.start_date' , 'asc') 
          		->get();
							//cast([date] as datetime)		

						if(($tripname[0]->start_date)>=$today){	
							echo '<div class="container">';
							echo '<div class="row">';
							echo '<div class="col-md-6 col-md-offset-3">';
							echo 			'<div class="card">';
							echo          '<div class="card-image">'.'<img class="img-responsive" src="http://lorempixel.com/555/300/sports">';
							echo					'</div>';
							echo          '<div class="card-content">';
							echo              '<span class="card-title">'.($tripname[0]->trips_name).'</span>';                    
							echo              '<button type="button" id="show" class="btn btn pull-right" aria-label="Left Align">'."review".'</button>';
							echo					'</div>';
							echo          '<div class="card-action">';
							echo             '<a href="#" target="new_blank">'."Link".'</a>';
							echo					'</div>';
      				echo          '<div class="card-reveal">';
      				echo              '<span class="card-title">'.'<a href="/schedules/'.$tripname[0]->id.'">'.($tripname[0]->trips_name).'</a>';
							echo							'</span>';
							echo							'<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
							echo								'<span aria-hidden="true">'."×".'</span>';
							echo							'</button>';		
							echo 							'<p>'."วันเริ่มเดินทาง : ".date('d/m/Y', strtotime($tripname[0]->start_date)).'<br>';
							echo 							"วันสิ้นสุดการเดินทาง : ".date('d/m/Y', strtotime($tripname[0]->departure_date)).'<br>';
							echo 							'<a href="/paysum/'.$tripbook[$i]->id.'">'."จำนวนคนที่จอง : ".($tripbook[$i]->number_booking).'</a>'.'<br>';
							echo 							"วันเวลาที่จอง : ".date('d/m/Y', strtotime($tripbook[$i]->booking_time)).'&nbsp'.date('h:i a', strtotime($tripbook[$i]->booking_time)).'<br>';
							echo 							"สถานะการจอง : ";
																if($tripname[0]->status != 'success'){
																	echo "การจองไม่สำเร็จ";
																	echo '</p>';
																}else{
																		echo "จ่ายเงินสำเร็จแล้ว";
																		echo '</p>';
																}
							echo 					'</div>';	
							echo 				'</div>';
							echo '</div>';
							echo '</div>';
							echo '</div>';
												}	
																												
										}
									}
									else
										echo "ไม่มีรายการ";
										?>
  </div>
</div>
<script>
$(function(){

    $('#show').on('click',function(){        
        $('.card-reveal').slideToggle('slow');
    });
    
    $('.card-reveal .close').on('click',function(){
        $('.card-reveal').slideToggle('slow');
    });
});
</script>



@endsection