@extends('layouts.headprofile') 
@section('title', 'setting') 
@section('content')



<link href="{{ URL::asset('/css/profile/blogttc.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('/css/profile_setting/navbar-affix.css') }}" rel="stylesheet" type="text/css" />

<body data-spy="scroll" data-target=".scrollspy">


	<div class="container">
		<div class="row">

			<div class="col-md-3 scrollspy">
				<ul id="nav" class="nav hidden-xs hidden-sm" data-spy="affix" data-offset-top="60" data-offset-bottom="200">
					<li>
						<a href="#personal-info">ข้อมูลส่วนตัว</a>
					</li>
					<li>
						<a href="#edit-avatar">รูปประจำตัว</a>
					</li>
					<li>
						<a href="#address">ที่อยู่</a>
					</li>
				</ul>
			</div>

			<div class="col-md-9">
				<section id="personal-info">
					<h2>
						<span class="fa fa-edit"></span> ข้อมูลส่วนตัว</h2>
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-md-3 control-label" for="user_title">คำนำหน้า</label>
							<div class="col-md-6">
								<select name="user_title" id="user_title" class="form-control">
									<option></option>
									<option value="MR.">Mr.</option>
									<option value="MRS.">Mrs.</option>
									<option value="MS.">Ms.</option>
									<option value="DR.">Dr.</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">ชื่อจริง</label>
							<div class="col-lg-6">
								<input class="form-control" type="text" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">นามสกุลจริง</label>
							<div class="col-lg-6">
								<input class="form-control" type="text" value="">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label" for="gender">เพศ</label>
							<div class="col-md-6">
								<select name="gender" id="gender" class="form-control">
									<option value="N">ไม่ต้องการระบุ</option>
									<option value="M">ชาย</option>
									<option value="F" selected="">หญิง</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">อายุ</label>
							<div class="col-lg-6">
								<input class="form-control" type="text" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">เบอร์โทรศัพท์</label>
							<div class="col-lg-6">
								<input class="form-control" type="text" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Email</label>
							<div class="col-lg-6">
								<input class="form-control" type="text" value="">
							</div>
						</div>

					</form>
					<button style="float:right;" type="button" class="btn btn-primary left"> บันทึก</button>
				</section>
				<!--end of #personal-info-->

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

								<input type="file" name="avatarpic"> </span>
							
							<button style="float:right;" type="button" class="btn btn-primary"> บันทึก</button>
						</div>
					</div>
				</section>
				<!--end of #web-devlopment-->

				<section id="address" style="height:350px;">
					<h2>
						<span class="fa fa-edit"></span> ที่อยู่</h2>
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-lg-3 control-label">จังหวัด</label>
							<div class="col-md-6">
								<select name="user_title" id="user_title" class="form-control">
									<option></option>
									<option value="MR.">Mr.</option>
									<option value="MRS.">Mrs.</option>
									<option value="MS.">Ms.</option>
									<option value="DR.">Dr.</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">เขต/อำเภอ</label>
							<div class="col-md-6">
								<select name="user_title" id="user_title" class="form-control">
									<option></option>
									<option value="MR.">Mr.</option>
									<option value="MRS.">Mrs.</option>
									<option value="MS.">Ms.</option>
									<option value="DR.">Dr.</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">ตำบล</label>
							<div class="col-md-6">
								<select name="user_title" id="user_title" class="form-control">
									<option></option>
									<option value="MR.">Mr.</option>
									<option value="MRS.">Mrs.</option>
									<option value="MS.">Ms.</option>
									<option value="DR.">Dr.</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">รหัสไปรษณีย์</label>
							<div class="col-lg-6">
								<input class="form-control" type="text" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">รายละเอียดที่อยู่</label>
							<div class="col-lg-6">
								<input class="form-control" type="text" value="" placeholder="ห้องเลขที่,บ้านเลขที่,ตึก,ชื่อถนน">
							</div>
						</div>
						
			
			</form>
			<button style="float:right;" type="button" class="btn btn-primary"> บันทึก</button>
			</section>
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