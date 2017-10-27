@extends('layouts.agency2') 
@section('title', 'Agency') 
@section('content')
<div class="welcome about">
	<div class="container">  
		<h3 class="agileits-title">{{$travelagencies->agency_name_en}}</h3>
		<h3 class="agileits-title" style="font-size:35px;">{{$travelagencies->agency_name_th}}</h3>
		<div class="about-grids"> 
			<div class="col-md-5 welcome-w3right">
				<img src="/img/img4.jpg" class="img-responsive" alt="" />
			</div>
			<div class="col-md-7 welcome-w3left">
				<h4>{{$travelagencies->agency_description}}</h4>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="welcome about">
<div class="container">
	<h5>ทริป</h5>
	<div class="table-responsive text-center" style="font-family:Prompt;">
  	
		<table class="table" >
  		<thead>
  			<tr>
  				<th class="text-center" style="width:380px;">ชื่อทริป</th>
  				<th class="text-center">จำนวนวัน</th>
  				<th class="text-center">จำนวนคืน</th>
					<th class="text-center">รายละเอียด</th>
  			</tr>
  		</thead>
  			@foreach($trips as $trip)
  			<tr class="">
  				<td><a href="/schedules/{{$trip->id}}">{{$trip->trips_name}}</a></td>
  				<td>{{$trip->trip_nday}}</td>
  				<td>{{$trip->trip_nnight}}</td>
					<td>{{$trip->trip_description}}</td>
  			</tr>
  			@endforeach
  	</table>
  </div>

	<div class="clearfix"></div>
	
</div>
</div>

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

	<!-- footer start here -->
  <div class="footer-agile">
    <div class="container">
      <div class="footer-agileinfo">
        <div class="col-md-5 col-sm-5 footer-wthree-grid">
          <div class="agileits-w3layouts-tweets">
            <h5>{{$travelagencies->agency_name_en}}</h5>
            <h5>{{$travelagencies->agency_name_th}}</h5>
          </div>
          <p>{{$travelagencies->agency_description}}</p>
        </div>
        <div class="col-md-3 col-sm-3 footer-wthree-grid">
          <h3>Contact Info</h3>
          <ul>
            <li><span class="glyphicon glyphicon-menu-right"></span>TEL : {{$travelagencies->agency_tel1}}</li>
<li><span class="glyphicon glyphicon-menu-right"></span>FAX : {{$travelagencies->agency_fax}}</li>
            <li><span class="glyphicon glyphicon-menu-right"></span>E-MAIL : {{$travelagencies->agency_email}}</li>
						<li><span class="glyphicon glyphicon-menu-right"></span>WEBSITE : {{$travelagencies->agency_web}}</li>
						<li><span class="glyphicon glyphicon-menu-right"></span>FACEBOOK : {{$travelagencies->agency_fb}}</li>
            
          </ul>
        </div>
        <div class="col-md-4 col-sm-4 footer-wthree-grid">
          <h3>Address</h3>
          <ul>
            <li><p>{{$travelagencies->agency_name_th}}</p></li>
            <li><p>{{$travelagencies->agency_address}}</p></li>
            <br>
						<li>Tax ID : {{$travelagencies->agency_tax_id}}</li>
<li>Travel License :  {{$travelagencies->agency_license}}</li>
<li>IATA Accredited Agent : <li>Travel License :  {{$travelagencies->agency_iata_no}}</li></li>
						
          </ul>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="copy-right">
        <p>© 2017 Holiday Spot . All rights reserved | Design by UP TO TRAIN</a></p>
      </div>
    </div>
  </div>
  <!-- //footer end here -->

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