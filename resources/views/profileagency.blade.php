@extends('layouts.headIndex') 
@section('title', 'Agency') 
@section('content')
 <div class="welcome about">
		<div class="container">  
			<h3 class="agileits-title">{{$travelagencies->agency_name_en}}</h3>
			<h3 class="agileits-title">{{$travelagencies->agency_name_th}}</h3>
			<div class="about-grids"> 
				<div class="col-md-5 welcome-w3right">
					<img src="images/img4.jpg" class="img-responsive" alt="" />
				</div>
				<div class="col-md-7 welcome-w3left">
					<h4></h4>
					<h4>License :: {{$travelagencies->agency_license}}</h4>
					<h4>IATA :: {{$travelagencies->agency_iata_no}}<h4>
					<h4>TAX ID :: {{$travelagencies->agency_tax_id}}<h4>
					<h4>ADDRESS :: {{$travelagencies->agency_address}}<h4>
					<h4>PROVINCE :: {{$travelagencies->agency_province}}<h4>
					<h4>ZIPCODE :: {{$travelagencies->agency_zipcode}}<h4>
					<h4>TEL :: {{$travelagencies->agency_tel1}}<h4>
					<p>{{$travelagencies->agency_description}}</p> <br> <br>
					<h4>{{$travelagencies->agency_fax}}</h4>
					<h4>{{$travelagencies->agency_email}}</h4>
					<h4>{{$travelagencies->agency_web}}</h4>
					<h4>{{$travelagencies->agency_fb}}</h4>
					ทริปที่มี
					<table class='table'>
						
						<tr>
							<td>ชื่อทริป
							</td>
							<td>วัน
							</td>
							<td>คืน
							</td>
							<td>รายละเอียด
							</td>
						</tr>
						@foreach($trips as $trip)
						<tr>
						 <td><a href="/schedules/{{$trip->id}}">{{$trip->trips_name}}</a>
						</td>
						<td>{{$trip->trip_nday}}
						</td>
						<td>{{$trip->trip_nnight}}
						</td>
						<td>{{$trip->trip_description}}
						</td>
						</tr>
						@endforeach
					</table>

				</div> 
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //about -->
<!-- tours 
	<div class="welcome portfolio">
		<div class="container">  
			<h3 class="agileits-title">Our Tours</h3>  
			<div class="gallery_gds">
				<ul class="simplefilter">
					<li class="active" data-filter="all">All</li>
					<li data-filter="1">Category 1</li>
					<li data-filter="2">Category 2</li>
					<li data-filter="3">Category 3</li>
				</ul>
				<div class="filtr-container">
					<div class="col-md-4 col-sm-4 filtr-item" data-category="1" data-sort="Busy streets">
						<div class="agileits-img">
							<a href="images/img1.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
								<img class="img-responsive  " src="images/img1.jpg" alt=""  /> 
							</a> 
						</div>
					</div>
					<div class="col-md-4 col-sm-4 filtr-item" data-category="2, 3" data-sort="Luminous night">
						<div class="agileits-img">
							<a href="images/g2.jpg" class="swipebox" title="Duis maximus tortor diam, ac lobortis justo rutrum quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non purus fermentum, eleifend velit non">
								<img src="images/g2.jpg" alt="" class="img-responsive" />
							</a>	
						</div>
					</div>
					<div class="col-md-4 col-sm-4 filtr-item" data-category="1" data-sort="City wonders">
						<div class="agileits-img">
							<a href="images/g3.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
								<img src="images/g3.jpg" alt="" class="img-responsive  " />
							</a>	
						</div>
					</div>
					<div class="col-md-4 col-sm-4 filtr-item" data-category="3" data-sort="Industrial site">
						<div class="agileits-img">
							<a href="images/g4.jpg" class="swipebox" title="Praesent non purus fermentum, eleifend velit non Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis.">
								<img src="images/g4.jpg" alt="" class="img-responsive " />
							</a>	
						</div>
					</div>
					<div class="col-md-4 col-sm-4 filtr-item" data-category="3" data-sort="In production">
						<div class="agileits-img">
							<a href="images/g5.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
								<img src="images/g5.jpg" alt="" class="img-responsive  " />
							</a>	
						</div>
					</div>
					<div class="col-md-4 col-sm-4 filtr-item" data-category="2" data-sort="Peaceful lake">
						<div class="agileits-img">
							<a href="images/img2.jpg" class="swipebox" title="Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
								<img src="images/img2.jpg" alt="" class="img-responsive  " />
							</a>	
						</div>
					</div>
				   <div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
	 //tours --> 
	<!-- contact -->
	<div class="welcome contact">
		<div class="container">  
			<h3 class="agileits-title">Conment Us</h3>   
			<div class="contact-w3ls-row">
				<form action="#" method="post">
					<input type="text" name="First Name" placeholder="First Name" required="">
					<input class="email" name="Last Name" type="text" placeholder="Last Name" required="">
					<input type="text" name="Number" placeholder="Mobile Number" required="">
					<input class="email" name="Email" type="text" placeholder="Email" required="">
					<textarea name="Message" placeholder="Message" required=""></textarea>
					<input type="submit" value="SUBMIT">
				</form>
			</div>  
		</div>
	</div>
	<!-- //contact -->
	<script src="js/jquery.filterizr.js"></script>  
	<script src="js/controls.js"></script>
	<!-- Kick off Filterizr -->
	<script type="text/javascript">
		$(function() {
			//Initialize filterizr with default options
			$('.filtr-container').filterizr();
		});
	</script>	
	<!-- swipe box js -->
	<script src="js/jquery.swipebox.min.js"></script> 
	<script type="text/javascript">
			jQuery(function($) {
				$(".swipebox").swipebox();
			});
	</script> 
	<!-- //swipe box js --> 
@endsection