@extends('layouts.headprofile') 
@section('title', 'setting') 
@section('content')

<!--<link href="css/bootstrap3.min.css" rel="stylesheet" type="text/css" >
	<link href="css/member-style.css" type="text/css" rel="stylesheet">
	<link href="css/blog.min.css" rel="stylesheet" type="text/css">-->

<link href="css/profile/blogttc.css" rel="stylesheet" type="text/css">
<link href="css/profile/profile.css" rel="stylesheet" type="text/css">
<!--<link href="css/profile_setting/components.min.css" rel="stylesheet" type="text/css">-->
<link href="css/profile_setting/style-ttcmember.css" rel="stylesheet" type="text/css">

<div class="container">
	<!--	<link href="css/profile_setting/uniform.default.css" rel="stylesheet" type="text/css">-->
	<link href="css/profile_setting/bootstrap-fileinput.css" rel="stylesheet" type="text/css">
	<link href="css/profile_setting/toastr.min.css" rel="stylesheet" type="text/css">
	<div class="col-md-2 hidden-xs hidden-sm">
		<div class="settings-navbar">
			<div class="sidebar affix" id="setting-sidebar" data-spy="affix">
				<ul class="nav list-group sidebar-menu">
					<li class="list-group-item clearfix">
						<a href="#social-networks">
						<span class="settings-navbar-label">เครือข่ายสังคม</span>
						<i class="fa fa-globe pull-right"></i>
					</a>
					</li>
					<li class="list-group-item clearfix">
						<a href="#about-you">
						<span class="settings-navbar-label">เกี่ยวกับตัวท่าน</span>
						<i class="fa fa-user pull-right"></i>
					</a>
					</li>
					<li class="list-group-item clearfix">
						<a href="#credit-cards">
						<span class="settings-navbar-label">บัตรเครดิต</span>
						<i class="fa fa-credit-card pull-right"></i>
					</a>
					</li>
					<li class="list-group-item clearfix">
						<a href="#travel-preferences">
						<span class="settings-navbar-label">ข้อมูลผู้เดินทางในกลุ่มของท่าน</span>
						<i class="fa fa-briefcase pull-right"></i>
					</a>
					</li>
					<li class="list-group-item clearfix">
						<a href="#site-preferences">
						<span class="settings-navbar-label">รหัสผ่านและสกุลเงิน</span>
						<i class="fa fa-key pull-right"></i>
					</a>
					</li>
					<li class="list-group-item clearfix">
						<a href="#newsletter-subscriptions">
						<span class="settings-navbar-label">ตัวเลือกจดหมายข่าว</span>
						<i class="fa fa-envelope pull-right"></i>
					</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-10 col-sm-12" style="margin-top: 15px;">
		<div id="social-networks" class="content-page settings-section">
			<h2>เครือข่ายสังคม</h2>
			<hr>
			<div class="settings-content">
				<div class="settings-item row" data-settings-item="social_networks">
					<div class="settings-item__label">
						เครือข่ายของท่าน </div>
					<div class="settings-item__content">
						<div style="margin-bottom: 10px;">
							จำรหัสผ่านน้อยลงอีกหนึ่งรายการ! เพียงลิงก์บัญชีของท่านเข้ากับ Facebook หรือ Google </div>
						<div class="social-connect-buttons-wrapper js-social-connect-buttons-wrapper social-connect-buttons-wrapper--settings">
							<!-- Facebook user -->
							<a class="btn blue-steel btn-outline" data-component="popup-open" href="javascript:;" onclick="signOutFacebookUser();"> <i class="fa fa-facebook-official"></i> เชื่อมต่อบัญชี Facebook แล้ว</a>
							<!-- Google user -->
							<a class="btn red-sunglo btn-outline" data-component="popup-open" href="javascript:;" id="signinwithguser"> <i class="fa fa-google"></i> Google</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="about-you" class="content-page settings-section">
			<div class="settings-head">
				<h1>เกี่ยวกับตัวท่าน</h1>
				<hr>
			</div>
			<div class="settings-content">
				<div class="settings-content_public">
					<div class="settings-content__title">ท่านกำลังดำเนินการบน Thaitravelcenter.com</div>
					<div class="settings-content__subtitle">
						รายละเอียดเหล่านี้จะปรากฎข้าง ๆ ความคิดเห็น คะแนน รูปภาพ และข้อมูลอื่น ๆ ของท่านที่เผยแพร่สาธารณะ รายละเอียดใด ๆ ที่ท่านได้อัปเดตที่นี่จะปรากฏในกิจกรรมก่อนหน้านี้ของท่านเช่นกัน
					</div>
					<div class="form-group row">
						<label class="control-label col-md-3">ภาพโปรไฟล์</label>
						<div class="col-md-9">
							<iframe id="upload_target" name="upload_target" src="" style="display:none;"></iframe>
							<form id="form-avatar" action="/_member/module/setting/saveavartar.php" method="post" enctype="multipart/form-data" target="upload_target"
							  onsubmit="return startUpload(this);">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
										<img src="https://scontent.xx.fbcdn.net/v/t1.0-1/s200x200/16508263_1660676713946062_4952681256780516861_n.jpg?oh=409dd134e21cea115ec4bee48f6f2aea&amp;oe=5A0DBEE6"
										  alt="" width="150"> </div>
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px;"> </div>
									<div>
										<span class="btn default btn-file">
										<span class="fileinput-new"> <i class="fa fa-camera-retro"></i> เลือกรูปภาพ </span>
										<span class="fileinput-exists"> เปลี่ยน </span>
										<input type="file" name="avatarpic"> </span>
										<a href="javascript:;" class="btn red fileinput-exists fileinput-remove" data-dismiss="fileinput"> ลบ </a>
										<button type="submit" class="btn green fileinput-save hidden"> บันทึก </button>
									</div>
									<span class="help-block avatar_error font-red hidden">รูปต้องไม่เกิน 2 MB</span>
									<span class="help-block avatar_saving hidden"><i class="fa fa-spinner fa-spin"></i>กำลังบันทึก</span>
									<span class="help-block avatar_success font-green hidden"><i class="fa fa-check"></i>บันทึกข้อมูลเรียบร้อย</span>
								</div>
							</form>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 control-label">ชื่อดิสเพลย์</label>
						<div class="col-md-6">
							<input type="text" class="form-control input-sm" name="displayname" placeholder="Enter text" value="Supichaya Kantawong">
							<span class="help-block"><i class="fa fa-info-circle"></i> ท่านสามารถอัปเดตชื่อดิสเพลย์อันมีเอกลักษณ์ได้บ่อยเท่าที่ต้องการ </span>
						</div>
						<div class="settings-loader hidden">
							<i class="loader_icon"></i>
							<span class="loader_saving font-green hidden">กำลังบันทึก</span>
							<span class="loader_saved hidden">บันทึกข้อมูลเรียบร้อย</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 control-label">ช่วงอายุ</label>
						<div class="col-md-4">
							<select name="age_range" class="span3 form-control form-control--inline" data-validation-age-group="">
							<option></option>
							<option value="18_to_24">18 - 24</option><option value="25_to_34">25 - 34</option><option value="35_to_44">35 - 44</option><option value="45_to_54">45 - 54</option><option value="55_to_64">55 - 64</option><option value="65_plus">65 +</option>						</select>
						</div>
						<div class="settings-loader hidden">
							<i class="loader_icon"></i>
							<span class="loader_saving font-green hidden">กำลังบันทึก</span>
							<span class="loader_saved hidden">บันทึกข้อมูลเรียบร้อย</span>
						</div>
					</div>
					<div class="form-group row last">
						<label class="col-md-3 control-label">ประเทศ</label>
						<div class="col-md-4">
							<select class="form-control" name="location">
							<option></option>
							<option value="AD">อันเดอร์รา</option><option value="AE">สหรัฐอาหรับเอมิเรตส์</option><option value="AG">แอนติกาและบาร์บูดา</option><option value="AL">อัลบาเนีย</option><option value="AM">อาร์มาเนีย</option><option value="AN">เนเธอร์แลนด์แอนทิลลีส</option><option value="AR">อาร์เจนตินา</option><option value="AT">ออสเตรีย</option><option value="AU">ออสเตรเลีย</option><option value="AW">อารูบา</option><option value="AZ">อาเซอร์ไบจัน</option><option value="BA">บอสเนียและเฮอร์เซโกวีนา</option><option value="BB">บาร์เบโดส</option><option value="BE">เบลเยียม</option><option value="BG">บัลแกเรีย</option><option value="BH">บาห์เรน</option><option value="BJ">เบนิน</option><option value="BM">เบอร์มิวดา</option><option value="BN">บรูไนดารุสซาลาม</option><option value="BO">โบลิเวีย</option><option value="BR">บราซิล</option><option value="BS">บาฮามาส</option><option value="BW">บอตสวานา</option><option value="BY">เบลารุส</option><option value="CA">แคนาดา</option><option value="CD">สาธารณรัฐประชาธิปไตยคองโก</option><option value="CG">คองโก</option><option value="CH">สวิตเซอร์แลนด์</option><option value="CK">หมู่เกาะคุก</option><option value="CL">ชิลี</option><option value="CM">แคเมอรูน</option><option value="CN">จีน</option><option value="CO">โคลอมเบีย</option><option value="CR">คอสตาริกา</option><option value="CU">คิวบา</option><option value="CY">ไซปรัส</option><option value="CZ">สาธารณรัฐเช็ก</option><option value="DE">เยอรมนี</option><option value="DK">เดนมาร์ก</option><option value="DO">สาธารณรัฐโดมินิกัน</option><option value="EC">เอกวาดอร์</option><option value="EE">เอสโตเนีย</option><option value="EG">อียิปต์</option><option value="ES">สเปน</option><option value="ET">เอธิโอเปีย</option><option value="FI">ฟินแลนด์</option><option value="FJ">หมู่เกาะฟิจิ</option><option value="FM">ไมโครนีเซีย</option><option value="FR">ฝรั่งเศส</option><option value="GA">กาบอง</option><option value="GB">อังกฤษ</option><option value="GD">เกรเนดา</option><option value="GE">จอร์เจีย</option><option value="GI">ยิบรอลตาร์</option><option value="GL">กรีนแลนด์</option><option value="GM">แกมเบีย</option><option value="GP">กวาเดอลูป</option><option value="GR">กรีซ</option><option value="GT">กัวเตมาลา</option><option value="GU">กวม</option><option value="HK">ฮ่องกง</option><option value="HN">ฮอนดูรัส</option><option value="HR">โครเอเชีย</option><option value="HT">เฮติ</option><option value="HU">ฮังการี</option><option value="ID">อินโดนีเซีย</option><option value="IE">ไอร์แลนด์</option><option value="IL">อิสราเอล</option><option value="IN">อินเดีย</option><option value="IQ">อิรัก</option><option value="IR">อิหร่าน</option><option value="IS">ไอซ์แลนด์</option><option value="IT">อิตาลี</option><option value="JM">จาเมกา</option><option value="JO">จอร์แดน</option><option value="JP">ญี่ปุ่น</option><option value="KE">เคนยา</option><option value="KG">คีร์กีซสถาน</option><option value="KH">กัมพูชา</option><option value="KN">เซนต์คิตส์และเนวิส</option><option value="KP">เกาหลีเหนือ</option><option value="KR">เกาหลี</option><option value="KW">คูเวต</option><option value="KY">หมู่เกาะเคย์แมน</option><option value="KZ">คาซัคสถาน</option><option value="LA">ลาว</option><option value="LB">เลบานอน</option><option value="LC">เซนต์ลูเซีย</option><option value="LI">ลิกเตนสไตน์</option><option value="LK">ศรีลังกา</option><option value="LT">ลิทัวเนีย</option><option value="LU">ลักเซมเบิร์ก</option><option value="LV">ลัตเวีย</option><option value="LY">ลิเบีย</option><option value="MA">โมรอกโก</option><option value="MC">โมนาโก</option><option value="MD">มอลโดวา</option><option value="ME">มอนเตเนโกร</option><option value="MF">เซนต์มาร์ติน</option><option value="MK">มาซิโดเนีย</option><option value="ML">มาลี</option><option value="MM">เมียนมาร์</option><option value="MN">มองโกเลีย</option><option value="MO">มาเก๊า</option><option value="MP">หมู่เกาะนอร์เทิร์นมาเรียนา</option><option value="MT">มอลตา</option><option value="MU">มอริเชียส</option><option value="MV">มัลดีฟส์</option><option value="MX">เม็กซิโก</option><option value="MY">มาเลเซีย</option><option value="MZ">โมซัมบิก</option><option value="NA">นามิเบีย</option><option value="NC">นิวแคลิโดเนีย</option><option value="NF">เกาะนอร์ฟอล์ก</option><option value="NG">ไนจีเรีย</option><option value="NI">นิการากัว</option><option value="NL">เนเธอร์แลนด์</option><option value="NO">นอร์เวย์</option><option value="NP">เนปาล</option><option value="NZ">นิวซีแลนด์</option><option value="OM">โอมาน</option><option value="PA">ปานามา</option><option value="PE">เปรู</option><option value="PF">เฟรนช์โปลินีเซีย</option><option value="PH">ฟิลิปปินส์</option><option value="PK">ปากีสถาน</option><option value="PL">โปแลนด์</option><option value="PR">เปอร์โตริโก</option><option value="PT">โปรตุเกส</option><option value="PW">ปาเลา</option><option value="PY">ปารากวัย</option><option value="QA">กาตาร์</option><option value="RE">เรอูนียง</option><option value="RO">โรมาเนีย</option><option value="RS">เซอร์เบีย</option><option value="RU">รัสเซีย</option><option value="SA">ซาอุดิอาระเบีย</option><option value="SC">เซเชลส์</option><option value="SE">สวีเดน</option><option value="SG">สิงคโปร์</option><option value="SH">เซนต์เฮเลนา</option><option value="SI">สโลวีเนีย</option><option value="SK">สโลวะเกีย</option><option value="SM">ซานมาริโน</option><option value="SN">เซเนกัล</option><option value="SY">ซีเรีย</option><option value="SZ">สวาซิแลนด์</option><option value="TC">หมู่เกาะเติกส์และหมู่เกาะเคคอส</option><option value="TG">โตโก</option><option value="TH">ไทย</option><option value="TJ">ทาจิกิสถาน</option><option value="TM">เติร์กเมนิสถาน</option><option value="TN">ตูนิเซีย</option><option value="TO">ตองกา</option><option value="TR">ตุรกี</option><option value="TT">ตรินิแดดและโตเบโก</option><option value="TW">ไต้หวัน</option><option value="TZ">แทนซาเนีย</option><option value="UA">ยูเครน</option><option value="UG">ยูกันดา</option><option value="US">อเมริกา</option><option value="UY">อุรุกวัย</option><option value="UZ">อุซเบกิสถาน</option><option value="VC">เซนต์วินเซนต์และเกรนาดีนส์</option><option value="VE">เวเนซุเอลา</option><option value="VG">หมู่เกาะบริติชเวอร์จิน</option><option value="VI">หมู่เกาะเวอร์จินสหรัฐอเมริกา</option><option value="VN">เวียดนาม</option><option value="VU">วานูอาตู</option><option value="WS">ซามัว</option><option value="YE">เยเมน</option><option value="ZA">แอฟริกาใต้</option><option value="ZM">แซมเบีย</option><option value="ZW">ซิมบับเว</option>						</select>
						</div><br>
						<span class="col-md-6 help-block"><i class="fa fa-info-circle"></i> ผู้อื่นอยากรู้ว่าท่านมาจากที่ใด </span>
						<div class="settings-loader hidden">
							<i class="loader_icon"></i>
							<span class="loader_saving font-green hidden">กำลังบันทึก</span>
							<span class="loader_saved hidden">บันทึกข้อมูลเรียบร้อย</span>
						</div>
					</div>
				</div>

				<div class="settings-content_private">
					<div class="settings-content__title">สำหรับใช้ในการจอง</div>
					<div class="settings-content__subtitle">ข้อมูลนี้จะใช้สำหรับระบบกรอกอัตโนมัติเท่านั้น เพื่อให้ท่านจองได้เร็วขึ้น เราจะไม่เผยแพร่สาธารณะ</div>
					<div class="form-group row">
						<label class="col-md-3 control-label" for="user_title">คำนำหน้า</label>
						<div class="col-md-6">
							<select name="user_title" id="user_title" class="form-control">
							<option></option>
							<option value="MR.">Mr.</option><option value="MRS.">Mrs.</option><option value="MS.">Ms.</option><option value="DR.">Dr.</option>						</select>
						</div>
						<div class="settings-loader hidden">
							<i class="loader_icon"></i>
							<span class="loader_saving font-green hidden">กำลังบันทึก</span>
							<span class="loader_saved hidden">บันทึกข้อมูลเรียบร้อย</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 control-label" for="user_firstname">ชื่อ</label>
						<div class="col-md-6">
							<input type="text" name="user_firstname" id="user_firstname" value="Supichaya" class="form-control" maxlength="45">
						</div>
						<div class="settings-loader hidden">
							<i class="loader_icon"></i>
							<span class="loader_saving font-green hidden">กำลังบันทึก</span>
							<span class="loader_saved hidden">บันทึกข้อมูลเรียบร้อย</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 control-label" for="user_lastname">นามสกุล</label>
						<div class="col-md-6">
							<input type="text" name="user_lastname" id="user_lastname" value="Kantawong" class="form-control" maxlength="45">
						</div>
						<div class="settings-loader hidden">
							<i class="loader_icon"></i>
							<span class="loader_saving font-green hidden">กำลังบันทึก</span>
							<span class="loader_saved hidden">บันทึกข้อมูลเรียบร้อย</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 control-label" for="gender">เพศ</label>
						<div class="col-md-6">
							<select name="gender" id="gender" class="form-control">
							<option value="N">ไม่ต้องการระบุ</option><option value="M">ชาย</option><option value="F" selected="">หญิง</option>						</select>
						</div>
						<div class="settings-loader hidden">
							<i class="loader_icon"></i>
							<span class="loader_saving font-green hidden">กำลังบันทึก</span>
							<span class="loader_saved hidden">บันทึกข้อมูลเรียบร้อย</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 control-label" for="email">ที่อยู่อีเมล</label>
						<div class="col-md-9" id="part_email"><span class="block">สามารถบันทึกที่อยู่อีเมลได้สูงสุด 3 รายการ</span>
							<div class="list-group" id="list_email">
								<br>
								<div class="list-group-item div-form bg-default email-panel add-new-email hidden">
									<div class="col-md-11">
										<input type="email" name="new_email" id="new_email" class="form-control" maxlength="85" placeholder="กรอกอีเมลใหม่">
										<span class="help-block"> เราจะส่งลิงก์ไปให้เพื่อยืนยันการใช้อีเมลใหม่นี้ </span>
									</div>
									<div class="col-md-12">
										<div class="checkbox-list">
											<label>
                    <div class="checker"><span><input type="checkbox" name="use_as_main" value="Y"></span></div> เลือกอีเมลนี้เป็นอีเมลหลัก </label>
											<label>
            </label></div>
										<span class="help-block"> ข้อมูลยืนยันการจองจะถูกส่งไปยังที่อยู่อีเมลนี้ </span>
										<button type="button" class="btn green-turquoise btn-save-new-email">บันทึก</button>
										<button type="button" class="btn grey-salsa btn-cancel-add-email">ยกเลิก</button>
									</div>
								</div>
							</div>
							<button class="btn blue btn-outline btn-add-email" onclick="addNewEmail();"><i class="fa fa-plus"></i> เพิ่มอีเมล์</button>
							<small class="help-block font-red email-warning hidden"><i class="fa fa-exclamation"></i> ท่านมีอีเมล์ครบกำหนดจำนวนสูงสุดแล้ว โปรดลบบางอีเมล์ออกเพื่อเพิ่มอีเมล์ใหม่ </small>
							<script type="text/javascript">
								email_init();
								setTimeout(App.initAjax(), 1000);
							</script>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 control-label" for="list_address">ที่อยู่</label>
						
						<div class="col-md-9" id="part_address">
							<div class="portlet light bg-inverse">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-home font-blue"></i>
										<span class="caption-subject font-blue bold"> ที่อยู่บ้าน </span>
									</div>
									<div class="actions">
										<a class="btn btn-circle btn-default btn-edit-address" href="javascript:;">
                <i class="fa fa-pencil"></i> เปลี่ยนที่อยู่บ้าน            </a>
									</div>
								</div>
								<div class="portlet-body" id="show-address">
									<div>, </div>
									<div>, </div>
									<div class=""></div>
								</div>
								<div class="portlet-body div-form hidden" id="add-new-address">
									<div class="form-body">
										<div class="form-group col-md-9">
											<input type="text" name="address" class="form-control" value="" maxlength="85" placeholder="ที่อยู่">
										</div>
										<div class="form-group col-md-9">
											<input type="text" name="city" class="form-control" value="" maxlength="85" placeholder="เมือง/จังหวัด">
										</div>
										<div class="form-group col-md-9">
											<select class="form-control" name="country">
                    <option value=""> เลือกประเทศ </option>
                    <option value="AD">อันเดอร์รา</option><option value="AE">สหรัฐอาหรับเอมิเรตส์</option><option value="AG">แอนติกาและบาร์บูดา</option><option value="AL">อัลบาเนีย</option><option value="AM">อาร์มาเนีย</option><option value="AN">เนเธอร์แลนด์แอนทิลลีส</option><option value="AR">อาร์เจนตินา</option><option value="AT">ออสเตรีย</option><option value="AU">ออสเตรเลีย</option><option value="AW">อารูบา</option><option value="AZ">อาเซอร์ไบจัน</option><option value="BA">บอสเนียและเฮอร์เซโกวีนา</option><option value="BB">บาร์เบโดส</option><option value="BE">เบลเยียม</option><option value="BG">บัลแกเรีย</option><option value="BH">บาห์เรน</option><option value="BJ">เบนิน</option><option value="BM">เบอร์มิวดา</option><option value="BN">บรูไนดารุสซาลาม</option><option value="BO">โบลิเวีย</option><option value="BR">บราซิล</option><option value="BS">บาฮามาส</option><option value="BW">บอตสวานา</option><option value="BY">เบลารุส</option><option value="CA">แคนาดา</option><option value="CD">สาธารณรัฐประชาธิปไตยคองโก</option><option value="CG">คองโก</option><option value="CH">สวิตเซอร์แลนด์</option><option value="CK">หมู่เกาะคุก</option><option value="CL">ชิลี</option><option value="CM">แคเมอรูน</option><option value="CN">จีน</option><option value="CO">โคลอมเบีย</option><option value="CR">คอสตาริกา</option><option value="CU">คิวบา</option><option value="CY">ไซปรัส</option><option value="CZ">สาธารณรัฐเช็ก</option><option value="DE">เยอรมนี</option><option value="DK">เดนมาร์ก</option><option value="DO">สาธารณรัฐโดมินิกัน</option><option value="EC">เอกวาดอร์</option><option value="EE">เอสโตเนีย</option><option value="EG">อียิปต์</option><option value="ES">สเปน</option><option value="ET">เอธิโอเปีย</option><option value="FI">ฟินแลนด์</option><option value="FJ">หมู่เกาะฟิจิ</option><option value="FM">ไมโครนีเซีย</option><option value="FR">ฝรั่งเศส</option><option value="GA">กาบอง</option><option value="GB">อังกฤษ</option><option value="GD">เกรเนดา</option><option value="GE">จอร์เจีย</option><option value="GI">ยิบรอลตาร์</option><option value="GL">กรีนแลนด์</option><option value="GM">แกมเบีย</option><option value="GP">กวาเดอลูป</option><option value="GR">กรีซ</option><option value="GT">กัวเตมาลา</option><option value="GU">กวม</option><option value="HK">ฮ่องกง</option><option value="HN">ฮอนดูรัส</option><option value="HR">โครเอเชีย</option><option value="HT">เฮติ</option><option value="HU">ฮังการี</option><option value="ID">อินโดนีเซีย</option><option value="IE">ไอร์แลนด์</option><option value="IL">อิสราเอล</option><option value="IN">อินเดีย</option><option value="IQ">อิรัก</option><option value="IR">อิหร่าน</option><option value="IS">ไอซ์แลนด์</option><option value="IT">อิตาลี</option><option value="JM">จาเมกา</option><option value="JO">จอร์แดน</option><option value="JP">ญี่ปุ่น</option><option value="KE">เคนยา</option><option value="KG">คีร์กีซสถาน</option><option value="KH">กัมพูชา</option><option value="KN">เซนต์คิตส์และเนวิส</option><option value="KP">เกาหลีเหนือ</option><option value="KR">เกาหลี</option><option value="KW">คูเวต</option><option value="KY">หมู่เกาะเคย์แมน</option><option value="KZ">คาซัคสถาน</option><option value="LA">ลาว</option><option value="LB">เลบานอน</option><option value="LC">เซนต์ลูเซีย</option><option value="LI">ลิกเตนสไตน์</option><option value="LK">ศรีลังกา</option><option value="LT">ลิทัวเนีย</option><option value="LU">ลักเซมเบิร์ก</option><option value="LV">ลัตเวีย</option><option value="LY">ลิเบีย</option><option value="MA">โมรอกโก</option><option value="MC">โมนาโก</option><option value="MD">มอลโดวา</option><option value="ME">มอนเตเนโกร</option><option value="MF">เซนต์มาร์ติน</option><option value="MK">มาซิโดเนีย</option><option value="ML">มาลี</option><option value="MM">เมียนมาร์</option><option value="MN">มองโกเลีย</option><option value="MO">มาเก๊า</option><option value="MP">หมู่เกาะนอร์เทิร์นมาเรียนา</option><option value="MT">มอลตา</option><option value="MU">มอริเชียส</option><option value="MV">มัลดีฟส์</option><option value="MX">เม็กซิโก</option><option value="MY">มาเลเซีย</option><option value="MZ">โมซัมบิก</option><option value="NA">นามิเบีย</option><option value="NC">นิวแคลิโดเนีย</option><option value="NF">เกาะนอร์ฟอล์ก</option><option value="NG">ไนจีเรีย</option><option value="NI">นิการากัว</option><option value="NL">เนเธอร์แลนด์</option><option value="NO">นอร์เวย์</option><option value="NP">เนปาล</option><option value="NZ">นิวซีแลนด์</option><option value="OM">โอมาน</option><option value="PA">ปานามา</option><option value="PE">เปรู</option><option value="PF">เฟรนช์โปลินีเซีย</option><option value="PH">ฟิลิปปินส์</option><option value="PK">ปากีสถาน</option><option value="PL">โปแลนด์</option><option value="PR">เปอร์โตริโก</option><option value="PT">โปรตุเกส</option><option value="PW">ปาเลา</option><option value="PY">ปารากวัย</option><option value="QA">กาตาร์</option><option value="RE">เรอูนียง</option><option value="RO">โรมาเนีย</option><option value="RS">เซอร์เบีย</option><option value="RU">รัสเซีย</option><option value="SA">ซาอุดิอาระเบีย</option><option value="SC">เซเชลส์</option><option value="SE">สวีเดน</option><option value="SG">สิงคโปร์</option><option value="SH">เซนต์เฮเลนา</option><option value="SI">สโลวีเนีย</option><option value="SK">สโลวะเกีย</option><option value="SM">ซานมาริโน</option><option value="SN">เซเนกัล</option><option value="SY">ซีเรีย</option><option value="SZ">สวาซิแลนด์</option><option value="TC">หมู่เกาะเติกส์และหมู่เกาะเคคอส</option><option value="TG">โตโก</option><option value="TH">ไทย</option><option value="TJ">ทาจิกิสถาน</option><option value="TM">เติร์กเมนิสถาน</option><option value="TN">ตูนิเซีย</option><option value="TO">ตองกา</option><option value="TR">ตุรกี</option><option value="TT">ตรินิแดดและโตเบโก</option><option value="TW">ไต้หวัน</option><option value="TZ">แทนซาเนีย</option><option value="UA">ยูเครน</option><option value="UG">ยูกันดา</option><option value="US">อเมริกา</option><option value="UY">อุรุกวัย</option><option value="UZ">อุซเบกิสถาน</option><option value="VC">เซนต์วินเซนต์และเกรนาดีนส์</option><option value="VE">เวเนซุเอลา</option><option value="VG">หมู่เกาะบริติชเวอร์จิน</option><option value="VI">หมู่เกาะเวอร์จินสหรัฐอเมริกา</option><option value="VN">เวียดนาม</option><option value="VU">วานูอาตู</option><option value="WS">ซามัว</option><option value="YE">เยเมน</option><option value="ZA">แอฟริกาใต้</option><option value="ZM">แซมเบีย</option><option value="ZW">ซิมบับเว</option>                </select>
										</div>
										<div class="form-group col-md-9">
											<input type="text" name="zipcode" class="form-control" value="" maxlength="15" placeholder="รหัสไปรษณีย์">
										</div>
										<div class="form-group col-md-9">
											<input type="text" name="tel" class="form-control" value="" maxlength="40" placeholder="โทรศัพท์">
										</div>
										<div class="form-group col-md-12">
											<button type="button" class="btn green-turquoise btn-save-address">บันทึก</button>
											<button type="button" class="btn grey-salsa btn-cancel-address">ยกเลิก</button>
										</div>
									</div>
								</div>
							</div>
							<div class="portlet light bg-inverse">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-building font-blue"></i>
										<span class="caption-subject font-blue bold"> ที่อยู่บริษัท </span>
									</div>
									<div class="actions">
										<a class="btn btn-circle btn-default btn-edit-company" href="javascript:;">
                <i class="fa fa-pencil"></i> เปลี่ยนที่อยู่บริษัท            </a>
									</div>
								</div>
								<div class="portlet-body" id="show-company">
								</div>
								<div class="portlet-body div-form hidden" id="add-new-company">
									<div class="form-body">
										<div class="form-group col-md-9">
											<input type="text" name="company_name" class="form-control" value="" maxlength="85" placeholder="ชื่อบริษัท">
										</div>
										<div class="form-group col-md-9">
											<input type="text" name="company_vat_id" class="form-control" value="" maxlength="40" placeholder="เลขประจำตัวผู้เสียภาษี">
										</div>
										<div class="form-group col-md-9">
											<input type="text" name="address" class="form-control" value="" maxlength="85" placeholder="ที่อยู่">
										</div>
										<div class="form-group col-md-9">
											<input type="text" name="city" class="form-control" value="" maxlength="85" placeholder="เมือง/จังหวัด">
										</div>
										<div class="form-group col-md-9">
											<select class="form-control" name="country">
                    <option value=""> เลือกประเทศ </option>
                    <option value="AD">อันเดอร์รา</option><option value="AE">สหรัฐอาหรับเอมิเรตส์</option><option value="AG">แอนติกาและบาร์บูดา</option><option value="AL">อัลบาเนีย</option><option value="AM">อาร์มาเนีย</option><option value="AN">เนเธอร์แลนด์แอนทิลลีส</option><option value="AR">อาร์เจนตินา</option><option value="AT">ออสเตรีย</option><option value="AU">ออสเตรเลีย</option><option value="AW">อารูบา</option><option value="AZ">อาเซอร์ไบจัน</option><option value="BA">บอสเนียและเฮอร์เซโกวีนา</option><option value="BB">บาร์เบโดส</option><option value="BE">เบลเยียม</option><option value="BG">บัลแกเรีย</option><option value="BH">บาห์เรน</option><option value="BJ">เบนิน</option><option value="BM">เบอร์มิวดา</option><option value="BN">บรูไนดารุสซาลาม</option><option value="BO">โบลิเวีย</option><option value="BR">บราซิล</option><option value="BS">บาฮามาส</option><option value="BW">บอตสวานา</option><option value="BY">เบลารุส</option><option value="CA">แคนาดา</option><option value="CD">สาธารณรัฐประชาธิปไตยคองโก</option><option value="CG">คองโก</option><option value="CH">สวิตเซอร์แลนด์</option><option value="CK">หมู่เกาะคุก</option><option value="CL">ชิลี</option><option value="CM">แคเมอรูน</option><option value="CN">จีน</option><option value="CO">โคลอมเบีย</option><option value="CR">คอสตาริกา</option><option value="CU">คิวบา</option><option value="CY">ไซปรัส</option><option value="CZ">สาธารณรัฐเช็ก</option><option value="DE">เยอรมนี</option><option value="DK">เดนมาร์ก</option><option value="DO">สาธารณรัฐโดมินิกัน</option><option value="EC">เอกวาดอร์</option><option value="EE">เอสโตเนีย</option><option value="EG">อียิปต์</option><option value="ES">สเปน</option><option value="ET">เอธิโอเปีย</option><option value="FI">ฟินแลนด์</option><option value="FJ">หมู่เกาะฟิจิ</option><option value="FM">ไมโครนีเซีย</option><option value="FR">ฝรั่งเศส</option><option value="GA">กาบอง</option><option value="GB">อังกฤษ</option><option value="GD">เกรเนดา</option><option value="GE">จอร์เจีย</option><option value="GI">ยิบรอลตาร์</option><option value="GL">กรีนแลนด์</option><option value="GM">แกมเบีย</option><option value="GP">กวาเดอลูป</option><option value="GR">กรีซ</option><option value="GT">กัวเตมาลา</option><option value="GU">กวม</option><option value="HK">ฮ่องกง</option><option value="HN">ฮอนดูรัส</option><option value="HR">โครเอเชีย</option><option value="HT">เฮติ</option><option value="HU">ฮังการี</option><option value="ID">อินโดนีเซีย</option><option value="IE">ไอร์แลนด์</option><option value="IL">อิสราเอล</option><option value="IN">อินเดีย</option><option value="IQ">อิรัก</option><option value="IR">อิหร่าน</option><option value="IS">ไอซ์แลนด์</option><option value="IT">อิตาลี</option><option value="JM">จาเมกา</option><option value="JO">จอร์แดน</option><option value="JP">ญี่ปุ่น</option><option value="KE">เคนยา</option><option value="KG">คีร์กีซสถาน</option><option value="KH">กัมพูชา</option><option value="KN">เซนต์คิตส์และเนวิส</option><option value="KP">เกาหลีเหนือ</option><option value="KR">เกาหลี</option><option value="KW">คูเวต</option><option value="KY">หมู่เกาะเคย์แมน</option><option value="KZ">คาซัคสถาน</option><option value="LA">ลาว</option><option value="LB">เลบานอน</option><option value="LC">เซนต์ลูเซีย</option><option value="LI">ลิกเตนสไตน์</option><option value="LK">ศรีลังกา</option><option value="LT">ลิทัวเนีย</option><option value="LU">ลักเซมเบิร์ก</option><option value="LV">ลัตเวีย</option><option value="LY">ลิเบีย</option><option value="MA">โมรอกโก</option><option value="MC">โมนาโก</option><option value="MD">มอลโดวา</option><option value="ME">มอนเตเนโกร</option><option value="MF">เซนต์มาร์ติน</option><option value="MK">มาซิโดเนีย</option><option value="ML">มาลี</option><option value="MM">เมียนมาร์</option><option value="MN">มองโกเลีย</option><option value="MO">มาเก๊า</option><option value="MP">หมู่เกาะนอร์เทิร์นมาเรียนา</option><option value="MT">มอลตา</option><option value="MU">มอริเชียส</option><option value="MV">มัลดีฟส์</option><option value="MX">เม็กซิโก</option><option value="MY">มาเลเซีย</option><option value="MZ">โมซัมบิก</option><option value="NA">นามิเบีย</option><option value="NC">นิวแคลิโดเนีย</option><option value="NF">เกาะนอร์ฟอล์ก</option><option value="NG">ไนจีเรีย</option><option value="NI">นิการากัว</option><option value="NL">เนเธอร์แลนด์</option><option value="NO">นอร์เวย์</option><option value="NP">เนปาล</option><option value="NZ">นิวซีแลนด์</option><option value="OM">โอมาน</option><option value="PA">ปานามา</option><option value="PE">เปรู</option><option value="PF">เฟรนช์โปลินีเซีย</option><option value="PH">ฟิลิปปินส์</option><option value="PK">ปากีสถาน</option><option value="PL">โปแลนด์</option><option value="PR">เปอร์โตริโก</option><option value="PT">โปรตุเกส</option><option value="PW">ปาเลา</option><option value="PY">ปารากวัย</option><option value="QA">กาตาร์</option><option value="RE">เรอูนียง</option><option value="RO">โรมาเนีย</option><option value="RS">เซอร์เบีย</option><option value="RU">รัสเซีย</option><option value="SA">ซาอุดิอาระเบีย</option><option value="SC">เซเชลส์</option><option value="SE">สวีเดน</option><option value="SG">สิงคโปร์</option><option value="SH">เซนต์เฮเลนา</option><option value="SI">สโลวีเนีย</option><option value="SK">สโลวะเกีย</option><option value="SM">ซานมาริโน</option><option value="SN">เซเนกัล</option><option value="SY">ซีเรีย</option><option value="SZ">สวาซิแลนด์</option><option value="TC">หมู่เกาะเติกส์และหมู่เกาะเคคอส</option><option value="TG">โตโก</option><option value="TH">ไทย</option><option value="TJ">ทาจิกิสถาน</option><option value="TM">เติร์กเมนิสถาน</option><option value="TN">ตูนิเซีย</option><option value="TO">ตองกา</option><option value="TR">ตุรกี</option><option value="TT">ตรินิแดดและโตเบโก</option><option value="TW">ไต้หวัน</option><option value="TZ">แทนซาเนีย</option><option value="UA">ยูเครน</option><option value="UG">ยูกันดา</option><option value="US">อเมริกา</option><option value="UY">อุรุกวัย</option><option value="UZ">อุซเบกิสถาน</option><option value="VC">เซนต์วินเซนต์และเกรนาดีนส์</option><option value="VE">เวเนซุเอลา</option><option value="VG">หมู่เกาะบริติชเวอร์จิน</option><option value="VI">หมู่เกาะเวอร์จินสหรัฐอเมริกา</option><option value="VN">เวียดนาม</option><option value="VU">วานูอาตู</option><option value="WS">ซามัว</option><option value="YE">เยเมน</option><option value="ZA">แอฟริกาใต้</option><option value="ZM">แซมเบีย</option><option value="ZW">ซิมบับเว</option>                </select>
										</div>
										<div class="form-group col-md-9">
											<input type="text" name="zipcode" class="form-control" value="" maxlength="15" placeholder="รหัสไปรษณีย์">
										</div>
										<div class="form-group col-md-9">
											<input type="text" name="tel" class="form-control" value="" maxlength="40" placeholder="โทรศัพท์">
										</div>
										<div class="form-group col-md-12">
											<button type="button" class="btn green-turquoise btn-save-company">บันทึก</button>
											<button type="button" class="btn grey-salsa btn-cancel-company">ยกเลิก</button>
										</div>
									</div>
								</div>
							</div>
							<script type="text/javascript">
								editAddress();
								editCompany();
								setTimeout(App.initAjax(), 1000);
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="credit-cards" class="content-page settings-section">
			<div class="settings-head">
				<h1>บัตรเครดิต</h1>
				<hr>
			</div>
			<div class="settings-content">
				<div class="settings-content_publics">
					<div class="settings-content__title"></div>
					<div class="settings-content__subtitle">
						<i class="fa fa-lock"></i> เราจะใช้ข้อมูลนี้ในการกรอกข้อมูลอัตโนมัติ เพื่อให้ท่านสามารถจองที่พักได้รวดเร็วขึ้น โดยข้อมูลชำระเงินของท่านจะบันทึกอย่างปลอดภัย
					</div>
					<div class="form-group" id="card_list" style="overflow: hidden;margin: 0;">
						<div class="row div-grid-header">
							<div class="col-md-4">
								หมายเลขบัตรเครดิต </div>
							<div class="col-md-4">
								ชื่อเจ้าของบัตร </div>
							<div class="col-md-3">
								วันหมดอายุ </div>
						</div>
					</div>

					<div class="portlet light bg-inverse add-card hidden" style="margin-bottom: 0;">
						<div class="portlet-body div-form">
							<form class="add-card-form" action="" method="post">
								<div class="form-body">
									<div class="form-group col-md-9">
										<label> ประเภทบัตรเครดิต </label>
										<select class="form-control" name="mctype">
	                                	<option value="">เลือก</option>
	                                	<option value="visa">Visa</option>
	                                	<option value="mastercard">Mastercard</option>
	                                </select>
									</div>
									<div class="form-group col-md-9">
										<label> หมายเลขบัตรเครดิต </label>
										<input type="text" name="mcnumber" class="form-control" value="" maxlength="19" placeholder="">
									</div>
									<div class="form-group col-md-9">
										<label> ชื่อเจ้าของบัตร </label>
										<input type="text" name="mcname" class="form-control" value="" maxlength="85" placeholder="">
									</div>
									<div class="form-group col-md-9">
										<label class="col-md-12" style="padding:0;"> วันหมดอายุ </label>
										<div class="col-md-3" style="padding-left:0;">
											<select class="form-control" name="mcepmonth">
											<option value="">--</option>
																						<option value="01">01</option>
																						<option value="02">02</option>
																						<option value="03">03</option>
																						<option value="04">04</option>
																						<option value="05">05</option>
																						<option value="06">06</option>
																						<option value="07">07</option>
																						<option value="08">08</option>
																						<option value="09">09</option>
																						<option value="10">10</option>
																						<option value="11">11</option>
																						<option value="12">12</option>
													                                </select>
										</div>
										<div class="col-md-3" style="padding-left:0;">
											<select class="form-control" name="mcepyear">
											<option value="">--</option>
																						<option value="2017">2017</option>
																						<option value="2018">2018</option>
																						<option value="2019">2019</option>
																						<option value="2020">2020</option>
																						<option value="2021">2021</option>
																						<option value="2022">2022</option>
																						<option value="2023">2023</option>
																						<option value="2024">2024</option>
																						<option value="2025">2025</option>
																						<option value="2026">2026</option>
																						<option value="2027">2027</option>
																						<option value="2028">2028</option>
																						<option value="2029">2029</option>
																						<option value="2030">2030</option>
																						<option value="2031">2031</option>
																						<option value="2032">2032</option>
																						<option value="2033">2033</option>
																						<option value="2034">2034</option>
																						<option value="2035">2035</option>
																						<option value="2036">2036</option>
																						<option value="2037">2037</option>
																						<option value="2038">2038</option>
																						<option value="2039">2039</option>
																						<option value="2040">2040</option>
																						<option value="2041">2041</option>
																						<option value="2042">2042</option>
																						<option value="2043">2043</option>
																						<option value="2044">2044</option>
																						<option value="2045">2045</option>
																						<option value="2046">2046</option>
													                                </select>
										</div>
									</div>
									<div class="form-group col-md-12">
										<div class="checkbox-list">
											<label>
											<div class="checker"><span><input type="checkbox" name="use_for_business" value="Y"></span></div> สำหรับการจองเพื่อเดินทางติดต่อธุรกิจ </label>
											<label>
										<span class="help-block"> ท่านสามารถบันทึกบัตรเครดิตสำหรับการจัดเดินทางเพื่อติดต่อธุรกิจ วิธีนี้จะช่วยให้ออกใบเรียกชำระสำหรับการจองดังกล่าวได้ง่ายขึ้น </span>
									</label></div>
									</div>
									<div class="form-action col-md-12">
										<button type="button" class="btn green-turquoise btn-save-card">บันทึก</button>
										<button type="button" class="btn grey-salsa btn-cancel-card">ยกเลิก</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<button class="btn blue btn-outline btn-addcc" onclick="addNewcc();" style="margin-top: 20px;"><i class="fa fa-plus"></i> เพิ่มบัตร </button>
				</div>
			</div>
		</div>

		<div id="travel-preferences" class="content-page settings-section">
			<div class="settings-head">
				<h1>ข้อมูลผู้เดินทางในกลุ่มของท่าน</h1>
				<hr>
			</div>
			<div class="settings-content">
				<div class="settings-content_publics">
					<div class="settings-content__title"></div>
					<div class="settings-content__subtitle">
						บันทึกข้อมูลของผู้เดินทางในกลุ่ม เพื่อให้จัดการการเดินทางสำหรับกลุ่มง่ายขึ้น </div>
					<div class="form-group" id="pax_list" style="overflow: hidden;margin: 0;">
						<div class="row div-grid-header">
							<div class="col-md-6">
							</div>
							<div class="col-md-3">
								วันเดือนปีเกิด </div>
							<div class="col-md-2">
								ประเภทผู้เดินทาง </div>
							<div class="col-md-1">

							</div>
						</div>
					</div>

					<div class="portlet light bg-inverse add-pax hidden" style="margin-bottom: 0;">
						<div class="portlet-body div-form">
							<form class="add-pax-form" action="" method="post">
								<div class="form-body">
									<div class="form-group col-md-2">
										<label> ประเภทผู้เดินทาง </label>
										<select class="form-control" name="pax_type">
										<option value="">เลือก</option>
																				<option value="ADT">ผู้ใหญ่</option>
																				<option value="CHD">เด็ก (ไม่เกิน 12 ปี)</option>
																				<option value="INF">ทารก (ไม่เกิน 2 ขวบ)</option>
																			</select>
									</div>
									<div class="form-group col-md-2">
										<label> คำนำหน้า </label>
										<select class="form-control" name="title">
										<option value="">เลือก</option>
																				<option value="MR.">Mr.</option>
																				<option value="MRS.">Mrs.</option>
																				<option value="MS.">Ms.</option>
																				<option value="MISS.">Miss</option>
																				<option value="MSTR.">Master</option>
																				<option value="DR.">Dr.</option>
																			</select>
									</div>
									<div class="form-group col-md-4">
										<label> ชื่อ </label>
										<input type="text" name="firstname" class="form-control" value="" maxlength="19" placeholder="">
									</div>
									<div class="form-group col-md-4">
										<label> นามสกุล </label>
										<input type="text" name="lastname" class="form-control" value="" maxlength="85" placeholder="">
									</div>
									<div class="form-group col-md-9">
										<label class="col-md-12" style="padding:0;"> วันเดือนปีเกิด </label>
										<div class="col-md-2" style="padding-left:0;">
											<select class="form-control" name="dobdate">
											<option value="">--</option>
																						<option value="01">01</option>
																						<option value="02">02</option>
																						<option value="03">03</option>
																						<option value="04">04</option>
																						<option value="05">05</option>
																						<option value="06">06</option>
																						<option value="07">07</option>
																						<option value="08">08</option>
																						<option value="09">09</option>
																						<option value="10">10</option>
																						<option value="11">11</option>
																						<option value="12">12</option>
																						<option value="13">13</option>
																						<option value="14">14</option>
																						<option value="15">15</option>
																						<option value="16">16</option>
																						<option value="17">17</option>
																						<option value="18">18</option>
																						<option value="19">19</option>
																						<option value="20">20</option>
																						<option value="21">21</option>
																						<option value="22">22</option>
																						<option value="23">23</option>
																						<option value="24">24</option>
																						<option value="25">25</option>
																						<option value="26">26</option>
																						<option value="27">27</option>
																						<option value="28">28</option>
																						<option value="29">29</option>
																						<option value="30">30</option>
																						<option value="31">31</option>
																					</select>
										</div>
										<div class="col-md-4" style="padding-left:0;">
											<select class="form-control" name="dobmonth">
											<option value="">--</option>
																						<option value="01">มกราคม</option>
																						<option value="02">กุมภาพันธ์</option>
																						<option value="03">มีนาคม</option>
																						<option value="04">เมษายน</option>
																						<option value="05">พฤษภาคม</option>
																						<option value="06">มิถุนายน</option>
																						<option value="07">กรกฎาคม</option>
																						<option value="08">สิงหาคม</option>
																						<option value="09">กันยายน</option>
																						<option value="10">ตุลาคม</option>
																						<option value="11">พฤศจิกายน</option>
																						<option value="12">ธันวาคม</option>
																					</select>
										</div>
										<div class="col-md-3" style="padding-left:0;">
											<select class="form-control" name="dobyear">
											<option value="">--</option>
																						<option value="2017">2017</option>
																						<option value="2016">2016</option>
																						<option value="2015">2015</option>
																						<option value="2014">2014</option>
																						<option value="2013">2013</option>
																						<option value="2012">2012</option>
																						<option value="2011">2011</option>
																						<option value="2010">2010</option>
																						<option value="2009">2009</option>
																						<option value="2008">2008</option>
																						<option value="2007">2007</option>
																						<option value="2006">2006</option>
																						<option value="2005">2005</option>
																						<option value="2004">2004</option>
																						<option value="2003">2003</option>
																						<option value="2002">2002</option>
																						<option value="2001">2001</option>
																						<option value="2000">2000</option>
																						<option value="1999">1999</option>
																						<option value="1998">1998</option>
																						<option value="1997">1997</option>
																						<option value="1996">1996</option>
																						<option value="1995">1995</option>
																						<option value="1994">1994</option>
																						<option value="1993">1993</option>
																						<option value="1992">1992</option>
																						<option value="1991">1991</option>
																						<option value="1990">1990</option>
																						<option value="1989">1989</option>
																						<option value="1988">1988</option>
																						<option value="1987">1987</option>
																						<option value="1986">1986</option>
																						<option value="1985">1985</option>
																						<option value="1984">1984</option>
																						<option value="1983">1983</option>
																						<option value="1982">1982</option>
																						<option value="1981">1981</option>
																						<option value="1980">1980</option>
																						<option value="1979">1979</option>
																						<option value="1978">1978</option>
																						<option value="1977">1977</option>
																						<option value="1976">1976</option>
																						<option value="1975">1975</option>
																						<option value="1974">1974</option>
																						<option value="1973">1973</option>
																						<option value="1972">1972</option>
																						<option value="1971">1971</option>
																						<option value="1970">1970</option>
																						<option value="1969">1969</option>
																						<option value="1968">1968</option>
																						<option value="1967">1967</option>
																						<option value="1966">1966</option>
																						<option value="1965">1965</option>
																						<option value="1964">1964</option>
																						<option value="1963">1963</option>
																						<option value="1962">1962</option>
																						<option value="1961">1961</option>
																						<option value="1960">1960</option>
																						<option value="1959">1959</option>
																						<option value="1958">1958</option>
																						<option value="1957">1957</option>
																						<option value="1956">1956</option>
																						<option value="1955">1955</option>
																						<option value="1954">1954</option>
																						<option value="1953">1953</option>
																						<option value="1952">1952</option>
																						<option value="1951">1951</option>
																						<option value="1950">1950</option>
																						<option value="1949">1949</option>
																						<option value="1948">1948</option>
																						<option value="1947">1947</option>
																						<option value="1946">1946</option>
																						<option value="1945">1945</option>
																						<option value="1944">1944</option>
																						<option value="1943">1943</option>
																						<option value="1942">1942</option>
																						<option value="1941">1941</option>
																						<option value="1940">1940</option>
																						<option value="1939">1939</option>
																						<option value="1938">1938</option>
																					</select>
										</div>
									</div>
									<div class="form-action col-md-12">
										<button type="button" class="btn green-turquoise btn-save-pax">บันทึก</button>
										<button type="button" class="btn grey-salsa btn-cancel-pax">ยกเลิก</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<button class="btn blue btn-outline btn-addpax" onclick="addNewPax();" style="margin-top: 20px;"><i class="fa fa-plus"></i> เพิ่มผู้เดินทาง </button>
				</div>
			</div>
		</div>

		<div id="site-preferences" class="content-page settings-section">
			<div class="settings-head">
				<h1>รหัสผ่านและสกุลเงิน</h1>
				<hr>
			</div>
			<div class="settings-content">
				<div class="settings-content_publics">
					<div class="settings-content__title"></div>
					<div class="form-group row">
						<label class="col-md-3 control-label" for="currency">สกุลเงิน</label>
						<div class="col-md-6">
							<select name="currency" id="currency" class="form-control">
							<option value="">สกุลเงินโรงแรม</option>
							<option value="ILS" selected="">₪ ชเกลอิสราเอล</option><option value="PLN">zł ซวอตีโปแลนด์</option><option value="NAD">NAD ดอลลาร์นามิเบีย</option><option value="NZD">NZD ดอลลาร์นิวซีแลนด์</option><option value="FJD">FJD ดอลลาร์ฟิจิ</option><option value="USD">US$ ดอลลาร์สหรัฐอเมริกา</option><option value="SGD">S$ ดอลลาร์สิงคโปร์</option><option value="AUD">AUD ดอลลาร์ออสเตรเลีย</option><option value="HKD">HK$ ดอลลาร์ฮ่องกง</option><option value="CAD">CAD ดอลลาร์แคนาดา</option><option value="TWD">TWD ดอลลาร์ไต้หวันใหม่</option><option value="KWD">KWD ดีนาร์คูเวต</option><option value="JOD">JOD ดีนาร์จอร์แดน</option><option value="BHD">BHD ดีนาร์บาห์เรน</option><option value="AZN">AZN นิวมานัตอาเซอร์ไบจาน</option><option value="THB">THB บาท</option><option value="GBP">£ ปอนด์สเตอร์ลิง </option><option value="EGP">EGP ปอนด์อียิปต์</option><option value="XOF">XOF ฟรังก์ซีเอฟเอ BCEAO</option><option value="CHF">CHF ฟรังก์สวิส</option><option value="HUF">HUF ฟอรินต์ฮังการี</option><option value="EUR">€ ยูโร</option><option value="MYR">MYR ริงกิตมาเลเซีย</option><option value="SAR">SAR ริยัลซาอุดีอาระเบีย</option><option value="QAR">QAR ริยาลกาตาร์ </option><option value="UAH">UAH รีฟเนียยูเครน</option><option value="OMR">OMR รีอัลโอมาน</option><option value="INR">Rs. รูปีอินเดีย</option><option value="RUB">RUB รูเบิลรัสเซีย</option><option value="IDR">Rp รูเปียห์อินโดนีเซีย</option><option value="GEL">GEL ลารีจอร์เจีย</option><option value="MDL">MDL ลิวมอลโดวา</option><option value="RON">lei ลิวโรมาเนียใหม่</option><option value="TRY">TL ลีราตุรกี</option><option value="KRW">KRW วอนเกาหลี</option><option value="CNY">CNY หยวน</option><option value="AED">AED เดอร์แฮมสหรัฐอาหรับเอมิเรตส์</option><option value="KZT">KZT เทงเจคาซัคสถาน</option><option value="CLP">CL$ เปโซชิลี</option><option value="ARS">AR$ เปโซอาร์เจนตินา</option><option value="MXN">MXN เปโซเม็กซิโก</option><option value="COP">COP เปโซโคลอมเบีย</option><option value="JPY">¥ เยนญี่ปุ่น</option><option value="BRL">R$ เรียลบราซิล</option><option value="BGN">BGN เลฟบัลแกเรีย</option><option value="ZAR">ZAR แรนด์แอฟริกาใต้</option><option value="NOK">NOK โครนนอร์เวย์</option><option value="SEK">SEK โครนาสวีเดน</option><option value="DKK">DKK โครนเดนมาร์ก</option><option value="CZK">Kč โครูนาเช็ก</option>						</select>
						</div>
						<div class="settings-loader hidden">
							<i class="loader_icon"></i>
							<span class="loader_saving font-green hidden">กำลังบันทึก</span>
							<span class="loader_saved hidden">บันทึกข้อมูลเรียบร้อย</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 control-label" for="currency">รหัสผ่าน</label>
						<div class="col-md-9">
							ท่านต้องการเปลี่ยนรหัสผ่านใช่ไหม? คลิกที่ปุ่มด้านล่าง จากนั้นเราจะส่งอีเมลพร้อมลิงค์รีเซ็ตรหัสผ่าน <br>
							<button class="btn yellow-gold btn-outline btn-resetpass" onclick="resetPassword();"><i class="fa fa-refresh"></i> รีเซ็ตรหัสผ่าน </button>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div id="newsletter-subscriptions" class="content-page settings-section">
			<div class="settings-head">
				<h1>ตัวเลือกจดหมายข่าว</h1>
				<hr>
			</div>
			<div class="settings-content">
				<div class="settings-content_publics">
					<div class="settings-content__title"></div>
					<div class="settings-content__subtitle">
						อย่าพลาดข้อเสนอที่ดีที่สุด! เลือกว่าท่านต้องการรับข้อเสนอและคำแนะนำบ่อยแค่ไหน </div>
					<div id="part_newsletter">
						<h4>supichaya_29@hotmail.com</h4>
						<div class="form-group row">
							<div class="col-md-10">
								<div class="radio-list">
									<label>
                <div class="radio"><span><input type="radio" name="newsletter" value="D"></span></div> รายวัน  รับข้อเสนอและคำแนะนำทุกวัน </label>
									<label>
                <div class="radio"><span><input type="radio" name="newsletter" value="W"></span></div> รายสัปดาห์  แพ็กเกจอีเมลปรับแต่งเฉพาะบุคคลพร้อมข้อเสนอ </label>
									<label>
                <div class="radio"><span class="checked"><input type="radio" name="newsletter" value="N" checked=""></span></div> ไม่สนใจ  หากท่านไม่สนใจอีเมลข้อเสนอ โปรดเลือกตัวเลือกนี้ </label>
								</div>
							</div>
							<div class="settings-loader hidden">
								<i class="loader_icon"></i>
								<span class="loader_saving font-green hidden">กำลังบันทึก</span>
								<span class="loader_saved hidden">บันทึกข้อมูลเรียบร้อย</span>
							</div>
						</div>
						<script type="text/javascript">
							$('input[name="newsletter"]').click(function () {
								if ($(this).is(':checked') == true) {
									console.log($(this).val());
									saveDatas($(this), 'newsletter', 'tmn');
								}
								$.uniform.update('input[name="newsletter"]');
							});
							setTimeout(App.initAjax(), 1000);
						</script>
					</div>
				</div>
			</div>
		</div>

		<div id="account-removal" class="content-page settings-section hidden">
			<div class="settings-head">
				<h1>เพราะเหตุใดท่านจึงต้องการลบบัญชี?</h1>
				<hr>
			</div>
			<div class="settings-content">
				<div class="settings-content_publics">
					<div class="form-group row">
						<div class="col-md-12">
							<div class="radio-list">
								<label>
				                <div class="radio"><span><input type="radio" name="removal_reason" value="1"></span></div> ฉันได้รับอีเมลจาก Thaitravelcenter.com มากเกินไป </label>
								<div class="help-block reason_1" style="margin-left: 25px;">
									ท่านสามารถ<b>ยกเลิกการรับจดหมายข่าวจากเรา</b>และเก็บบัญชีของท่านไว้ ท่านไม่จำเป็นต้องพลาดสิทธิประโยชน์ในการมีบัญชี
									เพราะเราสามารถลบท่านจากรายการผู้รับอีเมลได้ </div>
								<div class="reason_action reason_1_action hidden" style="margin-left: 25px;">
									<input type="hidden" name="unsubscribe" value="N">
									<button class="btn blue go-unsubscribe" value="N"> ยกเลิกการรับจดหมายข่าวทั้งหมดของฉัน </button>
								</div>
								<div class="settings-loader hidden" style="margin-left: 25px;">
									<i class="loader_icon"></i>
									<span class="loader_saving font-green hidden">กำลังบันทึก</span>
									<span class="loader_saved hidden">บันทึกข้อมูลเรียบร้อย</span>
								</div>
								<label>
				                <div class="radio"><span><input type="radio" name="removal_reason" value="2"></span></div> อื่น ๆ </label>
								<div class="help-block reason_2" style="margin-left: 25px;">
									<b>ลบบัญชีของท่าน</b> และแบ่งปันความคิดเห็นเพิ่มเติมกับเรา เราเสียใจที่ต้องกล่าวลา โปรดบอกว่าเราจะพัฒนาบริการให้ดีขึ้นได้อย่างไร
								</div>
								<div class="reason_action reason_2_action hidden" style="margin-left: 25px;">
									<textarea name="reason" id="reason" class="form-control"></textarea>
									<button class="btn blue submit-removal"> ลบบัญชีของฉัน </button>
									<button class="btn blue btn-outline close-removal"> เก็บบัญชีของฉัน </button>
								</div>
								<div class="settings-loader hidden" style="margin-left: 25px;">
									<i class="loader_icon"></i>
									<span class="loader_saving font-green hidden">กำลังบันทึก</span>
									<span class="loader_saved hidden">บันทึกข้อมูลเรียบร้อย</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="profile_terms_footer full_width_terms">
			<div class="remove_account">
				<span data-component="mysettings-account-removal"><a href="javascript:void(0)" class="go-removal">คลิกที่นี่</a> เพื่อลบบัญชี Thaitravelcenter.com ของท่าน</span>
			</div>
		</div>
	</div>

	<script src="js/profile_setting/bootstrap-fileinput.js" type="text/javascript"></script>
	<script src="js/profile_setting/toastr.min.js" type="text/javascript"></script>
	<script src="js/profile_setting/bootbox.min.js" type="text/javascript"></script>
	<script src="js/profile_setting/jquery.validate.min.js" type="text/javascript"></script>
	<script src="js/profile_setting/jquery.uniform.min.js" type="text/javascript"></script>
	<script src="js/profile_setting/jquery.blockui.min.js" type="text/javascript"></script>
	<!-- <script src="/_member/assets/js/facebookapi.js" type="text/javascript"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="https://apis.google.com/js/api:client.js"></script>
<script src="/_member/assets/js/googleuserapi.js" type="text/javascript"></script>
		<script src="js/profile_setting/app.min.js" type="text/javascript"></script>-->

	<script src="js/profile_setting/setting.js" type="text/javascript"></script>
	<script src="js/profile_setting/setting-avatar.js" type="text/javascript"></script>
	<script src="js/profile_setting/setting-email.js" type="text/javascript"></script>
	<script src="js/profile_setting/setting-address.js" type="text/javascript"></script>
	<script src="js/profile_setting/setting-cc.js" type="text/javascript"></script>
	<script src="js/profile_setting/setting-pax.js" type="text/javascript"></script>

	<script type="text/javascript" src="js/jquery.stellar.min.js"></script>
	<script>
	enableChaser = 0;
	</script>
	<script type="text/javascript">
		// $('.global-map-area').addClass('hidden');
        function changeLang(lang){
            var url = window.location.href;
            var curr_lang_pos = url.lastIndexOf('/') + 1;
            // var curr_lang = url.substring(curr_lang_pos);
            var url_hash = '';
            if( (url.indexOf('#') > -1) ){
                url_hash = url.split('#');
                url = url_hash[0];
                url_hash = url_hash[1];
            }
            url = url.substring(0,curr_lang_pos)+lang;
            // if( (url.indexOf('locale') > -1) ){
                // var curr_lang = (lang=='th')?'en':'th';
                // url = url.replace('='+curr_lang,'='+lang);
            // }else{
                // if( (url.indexOf('?') > -1) ){
                    // url = url+'&locale='+lang;
                // }else{
                    // url = url+'?locale='+lang;
                // }
            // }
            window.location = (url_hash=='')?url:url+'#'+url_hash;
        }
    </script>
</div>

@endsection