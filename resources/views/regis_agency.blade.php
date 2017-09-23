@extends('layouts.headindex') @section('title', 'log in') 
@section('content')

<head>
  <link href="css/login.css" rel="stylesheet">
  
</head>
<script src="js/regis.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<body>
  <div class="container">
    <!-- LOGIN FORM -->
    <div class="text-center" style="padding:100px 0">
      <div class="logo">register for new travel agency </div>
      <!-- Main Form -->
      <div class="login-form-1">
        <form action="/agency" method="POST" >
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                 {{ csrf_field() }}
          <div class="login-form-main-message"></div>
          <div class="main-login-form">
            <div class="login-group">
              <div class="form-group">
                <label for="reg_username" class="sr-only">ชื่อบริษัทภาษาไทย</label>
                <input type="text" class="form-control" id="agency_name_th" name="agency_name_th" placeholder="agency_name_th	">
              </div>

              <div class="form-group">
                <label for="reg_password" class="sr-only">ชื่อบริษัทภาษาอังกฤษ</label>
                <input type="text" class="form-control" id="agency_name_en" name="agency_name_en" placeholder="agency_name_en">
              </div>

              <div class="form-group">
                <label for="reg_password_confirm" class="sr-only">License</label>
                <input type="text" class="form-control" id="agency_license" name="agency_license" placeholder="agency_license">
              </div>

              <div class="form-group">
                <label for="reg_fullname" class="sr-only">IATA No</label>
                <input type="text" class="form-control" id="agency_iata_no" name="agency_iata_no" placeholder="IATA No">
              </div>
              <div class="form-group">
                <label for="reg_email" class="sr-only">agency_tax_id</label>
                <input type="text" class="form-control" id="agency_tax_id" name="agency_tax_id" placeholder="agency_tax_id">
              </div>

              <div class="form-group">
                <label for="reg_email" class="sr-only">agency_address</label>
                <input type="text" class="form-control" id="agency_address" name="agency_address" placeholder="agency_address">
              </div>
              <div class="form-group">
                <label for="reg_email" class="sr-only">	agency_province</label>
                <input type="text" class="form-control" id="agency_province" name="agency_province" placeholder="agency_province">
              </div>
              <div class="form-group">
                <label for="reg_email" class="sr-only">agency_zipcode</label>
                <input type="text" class="form-control" id="agency_zipcode" name="agency_zipcode" placeholder="agency_zipcode">
              </div>
              <div class="form-group">
                <label for="reg_email" class="sr-only">agency_tel1</label>
                <input type="text" class="form-control" id="agency_tel1" name="agency_tel1" placeholder="agency_tel1">
              </div>
              <div class="form-group">
                <label for="reg_email" class="sr-only">agency_tel2</label>
                <input type="text" class="form-control" id="agency_tel2" name="agency_tel2" placeholder="agency_tel2">
              </div>
              <div class="form-group">
                <label for="reg_email" class="sr-only">agency_fax</label>
                <input type="text" class="form-control" id="agency_fax" name="agency_fax" placeholder="agency_fax">
              </div>
              <div class="form-group">
                <label for="reg_email" class="sr-only">agency_email</label>
                <input type="text" class="form-control" id="agency_email" name="agency_email" placeholder="agency_email">
              </div>
              <div class="form-group">
                <label for="reg_email" class="sr-only">agency_web</label>
                <input type="text" class="form-control" id="agency_web" name="agency_web" placeholder="agency_web">
              </div>
              <div class="form-group">
                <label for="reg_email" class="sr-only">agency_fb</label>
                <input type="text" class="form-control" id="agency_fb" name="agency_fb" placeholder="agency_fb">
              </div>
              <div class="form-group">
                <label for="reg_email" class="sr-only">agency_description	</label>
                <input type="text" class="form-control" id="agency_description	" name="agency_description" placeholder="agency_description	">
              </div>
              <div class="form-group login-group-checkbox">
                <input type="checkbox" class="" id="reg_agree" name="reg_agree">
                <label for="reg_agree">i agree with <a href="#">terms</a></label>
              </div>
            </div>
            <input type="hidden" name="user_id" value="{{ $userId }}">
            <button type="submit" class="login-button">สมัครสมาชิก</button>
          </div>
          <div class="etc-login-form">
            <p>already have an account? <a href="/login">login here</a></p>
          </div>
        </form>
      </div>
      <!-- end:Main Form -->
    </div>
    </div>

</body>