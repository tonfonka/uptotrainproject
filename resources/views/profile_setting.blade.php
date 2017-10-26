@extends('layouts.headprofile') 
@section('title', 'setting') 
@section('content')



<link href="css/profile/blogttc.css" rel="stylesheet" type="text/css" />

<link href="css/profile_setting/navbar-affix.css" rel="stylesheet" type="text/css" />

<body data-spy="scroll" data-target=".scrollspy">


	<div class="container">
		<div class="row">

			<form class="form-horizontal" role="form" action="/profileuser" method="POST" name="id" enctype="multipart/form-data">
            
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			<section id="edit-avatar" style="height:281px;">
					<h2>
						<span class="fa fa-edit"></span> รูปประจำตัว</h2>
					<div class="col-md-3">
						<div class="text-center">
							<img src="https://scontent.xx.fbcdn.net/v/t1.0-1/s200x200/16508263_1660676713946062_4952681256780516861_n.jpg?oh=409dd134e21cea115ec4bee48f6f2aea&amp;oe=5A0DBEE6"
							  alt="" width="150" class="avatar img-circle" alt="avatar">

						</div>
					</div>
					<div class="col-md-9">
						<h6>Upload a different photo...</h6>


						<div>
							<span class="btn default btn-file">

								<input type="file" name="image" id="image" value="/images/{{Auth::user()->image}}"> </span>
							
						</div>
					</div>
				</section>
			<div class="col-md-9">
				<section id="personal-info">
					<h2>
						<span class="fa fa-edit"></span> ข้อมูลส่วนตัว</h2>
						<br>
					
					
						<div class="form-group">
							<label class="col-lg-3 control-label">ชื่อจริง</label>
							<div class="col-lg-6">
								<input class="form-control" type="text" name="firstname" id ="firstname" value="{{Auth::user()->firstname}}" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">นามสกุลจริง</label>
							<div class="col-lg-6">
								<input class="form-control" type="text"name ="lastname" id="lastname" value="{{Auth::user()->lastname}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label" for="gender">เพศ</label>
							<div class="col-md-6">
								<select name="gender" id="sex" name="	sex" class="form-control">
									<option value="ชาย">ชาย</option>
									<option value="หญิง" selected="">หญิง</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">อายุ</label>
							<div class="col-lg-6">
								<input class="form-control" type="text" name="age" id="age" value="{{Auth::user()->age}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">เบอร์โทรศัพท์</label>
							<div class="col-lg-6">
								<input class="form-control" type="text" id="phone" name="phone" value="{{Auth::user()->phone}}">
							</div>
						</div>
						<section id="address" style="height:350px;">
					<h2>
						<span class="fa fa-edit"></span> ที่อยู่</h2>
						<div class="form-group">
							<label class="col-lg-3 control-label">ที่อยู่</label>
							<div class="col-md-6">
							<input class="form-control" type="text" id="address" name="address" placeholder="ห้องเลขที่,บ้านเลขที่,ตึก,ชื่อถนน" value="{{Auth::user()->address}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">จังหวัด</label>
							<div class="col-md-6">
							<input class="form-control" type="text" id="province" name="province" value="{{Auth::user()->province}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">รหัสไปรษณีย์</label>
							<div class="col-lg-6">
								<input class="form-control" type="text" id="zipcode" name="zipcode" value="{{Auth::user()->zipcode}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">อาหารที่แพ้</label>
							<div class="col-lg-6">
								<input class="form-control" type="text"id ="food_allergy" name="food_allergy" value="{{Auth::user()->food_allergy}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">โรคประจำตัว</label>
							<div class="col-lg-6">
								<input class="form-control" type="text"id ="chronic_disease" name="chronic_disease" value="{{Auth::user()->chronic_disease}}">
							</div>
						</div>
						
			
			
			<button style="float:right;" type="button" class="btn btn-primary"> บันทึก</button>
			</section>

					</form>
					
		</div>
	</div>
	<!--end of .row-->
	</div>
	<!--end of .container-->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script>
	$(function() {
		$('#nav').affix({ 
			offset: { 
				top: 180, 
				bottom: function () { 
					return (this.bottom = $('.footer').outerHeight(true)) 
					} 
				} 
			})})
	</script>

</body>



@endsection