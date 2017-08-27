@extends('layouts.headprofile') 
@section('title', 'profile') 
@section('content')
	

<link href="css/profile/blogttc.css" rel="stylesheet" type="text/css">
<link href="css/profile/profile.css" rel="stylesheet" type="text/css">
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
								<article class="box" style="padding-top: 50px; padding-left:50px;">
									<div class="details">
										<h5 class="box-title"><a href="#"> ไม่มีรายการ </a></h5>
										<label class="price-wrapper"><span class="price-per-unit">  </span></label>
									</div>
								</article>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<h4>กำลังไปเร็วๆนี้</h4>
							<div class="image-box style14">
								<article class="box" style="padding-top: 50px; padding-left:50px;">
									<div class="details">
										<h5 class="box-title"><a href="#"> ไม่มีรายการ </a></h5>
										<label class="price-wrapper"><span class="price-per-unit">  </span></label>
									</div>
								</article>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="sidebar col-md-3">
				<div class="travelo-box book-with-us-box">
					<h4>ค้นหาการเดินทางครั้งใหม่</h4>
					<ul>
						<li>
							<!--<i class="soap-icon-hotel-1 circle blue-color"></i>-->
							<h5 class="title"><a href="/hotel" target="_blank">
									ค้นหาโรงแรมที่ดีที่สุด</a></h5>
						</li>
						<li>
							<!--<i class="icon soap-icon-plane-right takeoff-effect yellow-color circle"></i>-->
							<h5 class="title"><a href="/restuarant" target="_blank">
									ค้นหาร้านอาหารสุดคุ้ม</a></h5>
						</li>
						<li>
						<!--<i class="icon soap-icon-plane circle red-color"></i>-->
							<!--<i class="soap-icon-places circle red-color"></i>-->
							<h5 class="title"><a href="/trips" target="_blank">
									ทริปยอดนิยม</a></h5>
						</li>
						<li>
							<!--<i class="soap-icon-beach circle green-color"></i>-->
							<h5 class="title"><a href="/thailandtrips" target="_blank">
									ทริปในประเทศสุดชิล</a></h5>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection