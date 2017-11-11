@extends('layouts.agency2') @section('title', 'Agency') @section('content')
<style>
	.filterable {
		margin-top: 15px;
	}

	.filterable .panel-heading .pull-right {
		margin-top: -20px;
	}

	.filterable .filters input[disabled] {
		background-color: transparent;
		border: none;
		cursor: auto;
		box-shadow: none;
		padding: 0;
		height: auto;
	}

	.filterable .filters input[disabled]::-webkit-input-placeholder {
		color: #333;
	}

	.filterable .filters input[disabled]::-moz-placeholder {
		color: #333;
	}

	.filterable .filters input[disabled]:-ms-input-placeholder {
		color: #333;
	}
</style>
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
	<div class="container" style="font-family:Prompt;">
		<div class="row">
			<div class="panel panel-primary filterable">
				<div class="panel-heading">
					<h3 class="panel-title">ทริปทั้งหมดของบริษัท</h3>
					<div class="pull-right">
						<button class="btn btn-default btn-xs btn-filter">
							<span class="glyphicon glyphicon-filter"></span> Filter</button>
					</div>
				</div>
				<table class="table">
					<thead>
						<tr class="filters">
							<th class="text-center">
								<input type="text" class="form-control" placeholder="ชื่อทริป" disabled>
							</th>
							<th class="text-center"><input type="text" class="form-control" placeholder="จังหวัด" disabled></th>
							<th class="text-center"><input type="text" class="form-control" placeholder="จำนวนวัน" disabled></th>
							<th class="text-center"><input type="text" class="form-control" placeholder="จำนวนคืน" disabled></th>
							<th class="text-center"><input type="text" class="form-control" placeholder="ราคา" disabled></th>
							<th class="text-center"><input type="text" class="form-control" placeholder="รายละเอียด" disabled></th>
							<th class="text-center"><input type="text" class="form-control" placeholder="Rate" disabled></th>
						</tr>
					</thead>
					<tbody id="myTable">
						@foreach($trips as $trip)
						<?php
								$tripround = DB::table('triprounds')->where('trip_id',$trip->id)->min('price_adult');
								$review = DB::table('reviewTrip')->where('trip_id',$trip->id)->avg('rate');

						?>
						<tr class="">
							<td>
								<a href="/schedules/{{$trip->id}}">{{ str_limit($trip->trips_name, $limit = 30, $end = '....') }}</a>
							</td>
							<td>{{$trip->trip_province}}</td>
							<td>{{$trip->trip_nday}}</td>
							<td>{{$trip->trip_nnight}}</td>
							<td>{{$tripround}}</td>
							<td>{{ str_limit($trip->trip_description, $limit = 30, $end = '....') }}</td>
<td>
						@foreach($review as $reviews)
						@if(($reviews->rate) <'1')
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            @elseif(($reviews->rate) =='2')
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            @elseif(($reviews->rate) =='3')
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            @elseif(($reviews->rate) =='4')
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            @elseif(($reviews->rate) =='5')
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            @endif
						@endforeach
</td>

						</tr>
						@endforeach

					</tbody>
				</table>
				<div class="col-md-12 text-center">
					<ul class="pagination pagination-lg pager" id="myPager"></ul>
				</div>
			</div>
		</div>
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
					<li>
						<span class="glyphicon glyphicon-menu-right"></span>TEL : {{$travelagencies->agency_tel1}}</li>
					<li>
						<span class="glyphicon glyphicon-menu-right"></span>FAX : {{$travelagencies->agency_fax}}</li>
					<li>
						<span class="glyphicon glyphicon-menu-right"></span>E-MAIL : {{$travelagencies->agency_email}}</li>
					<li>
						<span class="glyphicon glyphicon-menu-right"></span>WEBSITE : {{$travelagencies->agency_web}}</li>
					<li>
						<span class="glyphicon glyphicon-menu-right"></span>FACEBOOK : {{$travelagencies->agency_fb}}</li>

				</ul>
			</div>
			<div class="col-md-4 col-sm-4 footer-wthree-grid">
				<h3>Address</h3>
				<ul>
					<li>
						<p>{{$travelagencies->agency_name_th}}</p>
					</li>
					<li>
						<p>{{$travelagencies->agency_address}}</p>
					</li>
					<br>
					<li>Tax ID : {{$travelagencies->agency_tax_id}}</li>
					<li>Travel License : {{$travelagencies->agency_license}}</li>
					<li>IATA Accredited Agent :
						<li>Travel License : {{$travelagencies->agency_iata_no}}</li>
					</li>

				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="copy-right">
			<p>© 2017 Holiday Spot . All rights reserved | Design by UP TO TRAIN</a>
			</p>
		</div>
	</div>
</div>
<!-- //footer end here -->

<!-- Kick off Filterizr -->
<script type="text/javascript">
	/*
	Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
	*/
	$(document).ready(function () {
		$('.filterable .btn-filter').click(function () {
			var $panel = $(this).parents('.filterable'),
				$filters = $panel.find('.filters input'),
				$tbody = $panel.find('.table tbody');
			if ($filters.prop('disabled') == true) {
				$filters.prop('disabled', false);
				$filters.first().focus();
			} else {
				$filters.val('').prop('disabled', true);
				$tbody.find('.no-result').remove();
				$tbody.find('tr').show();
			}
		});

		$('.filterable .filters input').keyup(function (e) {
			/* Ignore tab key */
			var code = e.keyCode || e.which;
			if (code == '9') return;
			/* Useful DOM data and selectors */
			var $input = $(this),
				inputContent = $input.val().toLowerCase(),
				$panel = $input.parents('.filterable'),
				column = $panel.find('.filters th').index($input.parents('th')),
				$table = $panel.find('.table'),
				$rows = $table.find('tbody tr');
			/* Dirtiest filter function ever ;) */
			var $filteredRows = $rows.filter(function () {
				var value = $(this).find('td').eq(column).text().toLowerCase();
				return value.indexOf(inputContent) === -1;
			});
			/* Clean previous no-result if exist */
			$table.find('tbody .no-result').remove();
			/* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
			$rows.show();
			$filteredRows.hide();
			/* Prepend no-result row if all rows are filtered */
			if ($filteredRows.length === $rows.length) {
				$table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' + $table.find('.filters th').length +
					'">No result found</td></tr>'));
			}
		});
	});
</script>

<!--paginate-->
<script>
	$.fn.pageMe = function (opts) {
		var $this = this,
			defaults = {
				perPage: 10,
				showPrevNext: false,
				hidePageNumbers: false
			},
			settings = $.extend(defaults, opts);

		var listElement = $this;
		var perPage = settings.perPage;
		var children = listElement.children();
		var pager = $('.pager');

		if (typeof settings.childSelector != "undefined") {
			children = listElement.find(settings.childSelector);
		}

		if (typeof settings.pagerSelector != "undefined") {
			pager = $(settings.pagerSelector);
		}

		var numItems = children.size();
		var numPages = Math.ceil(numItems / perPage);

		pager.data("curr", 0);

		if (settings.showPrevNext) {
			$('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
		}

		var curr = 0;
		while (numPages > curr && (settings.hidePageNumbers == false)) {
			$('<li><a href="#" class="page_link">' + (curr + 1) + '</a></li>').appendTo(pager);
			curr++;
		}

		if (settings.showPrevNext) {
			$('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
		}

		pager.find('.page_link:first').addClass('active');
		pager.find('.prev_link').hide();
		if (numPages <= 1) {
			pager.find('.next_link').hide();
		}
		pager.children().eq(1).addClass("active");

		children.hide();
		children.slice(0, perPage).show();

		pager.find('li .page_link').click(function () {
			var clickedPage = $(this).html().valueOf() - 1;
			goTo(clickedPage, perPage);
			return false;
		});
		pager.find('li .prev_link').click(function () {
			previous();
			return false;
		});
		pager.find('li .next_link').click(function () {
			next();
			return false;
		});

		function previous() {
			var goToPage = parseInt(pager.data("curr")) - 1;
			goTo(goToPage);
		}

		function next() {
			goToPage = parseInt(pager.data("curr")) + 1;
			goTo(goToPage);
		}

		function goTo(page) {
			var startAt = page * perPage,
				endOn = startAt + perPage;

			children.css('display', 'none').slice(startAt, endOn).show();

			if (page >= 1) {
				pager.find('.prev_link').show();
			} else {
				pager.find('.prev_link').hide();
			}

			if (page < (numPages - 1)) {
				pager.find('.next_link').show();
			} else {
				pager.find('.next_link').hide();
			}

			pager.data("curr", page);
			pager.children().removeClass("active");
			pager.children().eq(page + 1).addClass("active");

		}
	};

	$(document).ready(function () {

		$('#myTable').pageMe({
			pagerSelector: '#myPager',
			showPrevNext: true,
			hidePageNumbers: false,
			perPage: 5
		});

	});
</script>
<!--paginate-->
<!-- swipe box js -->
<script src="{{asset('/js/jquery.swipebox.min.js')}}"></script>
<script type="text/javascript">
	jQuery(function ($) {
		$(".swipebox").swipebox();
	});
</script>
<!-- //swipe box js -->
<script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/vendor/tether/tether.min.js')}}"></script>
<script src="{{asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
@endsection