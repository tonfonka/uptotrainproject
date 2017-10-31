@extends('layouts.agency2') 
@section('title', 'Agency') 
@section('content')
<div class="welcome about">
	<div class="container">  
		<h3 class="agileits-title">{{$travelagencies[0]->agency_name_en}}</h3>
		<h3 class="agileits-title" style="font-size:35px;">{{$travelagencies[0]->agency_name_th}}</h3>
		<div class="about-grids"> 
			<div class="col-md-5 welcome-w3right">
				<img src="/img/img4.jpg" class="img-responsive" alt="" />
			</div>
			<div class="col-md-7 welcome-w3left">
      <li>Address : {{$travelagencies[0]->agency_address}}</li>
      <li>Address : {{$travelagencies[0]->agency_province}}</li>
      <li>Address : {{$travelagencies[0]->agency_zipcode}}</li>
            <br>
						<li>Tax ID : {{$travelagencies[0]->agency_tax_id}}</li>
          <li>Travel License :  {{$travelagencies[0]->agency_license}}</li>
        <li>IATA Accredited Agent : <li>Travel License :  {{$travelagencies[0]->agency_iata_no}}</li></li>
           <li><span class="glyphicon glyphicon-menu-right"></span>TEL : {{$travelagencies[0]->agency_tel1}}</li>
            <li><span class="glyphicon glyphicon-menu-right"></span>FAX : {{$travelagencies[0]->agency_fax}}</li>
            <li><span class="glyphicon glyphicon-menu-right"></span>E-MAIL : {{$travelagencies[0]->agency_email}}</li>
						<li><span class="glyphicon glyphicon-menu-right"></span>WEBSITE : {{$travelagencies[0]->agency_web}}</li>
						<li><span class="glyphicon glyphicon-menu-right"></span>FACEBOOK : {{$travelagencies[0]->agency_fb}}</li>
            <br>
				<h4>{{$travelagencies[0]->agency_description}}</h4>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="welcome about">
<div class="container">
	

	<div class="clearfix"></div>
	
</div>
</div>

	
	<!-- //contact -->

	<!-- footer start here -->
  
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