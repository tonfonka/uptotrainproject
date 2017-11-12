<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>Registration Form For New Travel Agency</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="{{asset('/css/codebox/regis_agency.css')}}" />
  <link href='http://fonts.googleapis.com/css?family=Prompt' rel='stylesheet' type='text/css'>
  <link href="{{ URL::asset('/css/font-awesome.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />
</head>

<body>
  <div class="container">
    <!-- add -->
    <form action="/agency" method="POST">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> {{ csrf_field() }}
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Register Travel Agency</h1>
          </div>
          <!-- ./col lg 12 -->
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                Plase fill information this form.
              </div>
              <!-- ./div class panel-heading -->
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-12">
                    <form role="form-group">
                      <form>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Name(Thai)</label>
                              <input type="text" class="form-control" id="agency_name_th" name="agency_name_th" placeholder="Name(Thai)">
                            </div>
                            <div class="form-group">
                              <label>Name(Eng)</label>
                              <input type="text" id="agency_name_en" name="agency_name_en" class="form-control" placeholder="Name(ENG)">
                            </div>
                            <!--<div class="form-group">
                              <label for="exampleTextarea">Description</label>
                              <textarea class="form-control" id="agency_description" rows="5"></textarea>
                            </div>-->
                            <div class="form-group">
                              <label>Email </label>
                              <input type="text" id="agency_email" name="agency_email" class="form-control" placeholder="agency_email">
                            </div>
                            <div class="form-group">
                              <label>License</label>
                              <input ctype="text" class="form-control" id="agency_license" name="agency_license">
                            </div>
                            <div class="form-group">
                              <label>Tax ID </label>
                              <input type="text" class="form-control" id="agency_tax_id" name="agency_tax_id" placeholder="agency_tax_id">
                            </div>
                            <div class="form-group">
                              <label>IATA</label>
                              <input type="text" class="form-control" id="agency_iata_no" name="agency_iata_no" placeholder="IATA No">
                            </div>
                            <div class="form-group">
                              <label>Fax </label>
                              <input type="text" class="form-control" id="agency_fax" name="agency_fax" placeholder="agency_fax">
                            </div>
                          </div>
                          <!-- ./div class col-lg-6 -->
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Tel 1 </label>
                              <input type="text" id="agency_tel1" name="agency_tel1" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Tel 2 </label>
                              <input type="text" id="agency_tel2" name="agency_tel2" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Website </label>
                              <input type="text" id="agency_web" name="agency_web" value="http://" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Facebook</label>
                              <inputtype="text" id="agency_fb" name="agency_fb" class="form-control" value="www.facebook.com/">
                            </div>
                            <div class="form-group">
                              <label for="exampleTextarea">Address</label>
                              <textarea id="agency_address" name="agency_address" rows="9" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                              <label>Province</label>
                              <input type="text" id="agency_province" name="agency_province" class="form-control" placeholder="agency_province">
                            </div>
                            <div class="form-group">
                              <label>Zipcode</label>
                              <input type="text" id="agency_zipcode" name="agency_zipcode" maxlength="5" class="form-control" placeholder="agency_zipcode">
                            </div>
                          </div>
                          <!-- ./div col-lg-6 -->
                        </div>
                        <!-- ./div class row -->
                      </form>
                      <!-- ./form -->
                  </div>
                  <!-- ./div class col-lg-12 -->
                </div>
                <!-- ./div class row -->
                <br>
                <div class="form-group login-group-checkbox">
                  <input type="checkbox" class="" id="reg_agree" name="reg_agree">
                  <label for="reg_agree">i agree with
                    <a href="#">terms</a>
                  </label>
                </div>
              </div>
              <input type="hidden" name="user_id" value="{{ $userId }}">
              <button type="submit" class="login-button">Submit</button>
            </div>
            <div class="etc-login-form">
              <p>already have an account?
                <a href="/login">login here</a>
              </p>
            </div>

          </div>
          <!-- ./div class panel-body -->
          <div>
            <!-- ./div class panel-default -->
          </div>
          <!-- ./div class col-lg-12 body -->
        </div>
        <!-- /.row -->
      </div>
  </div>
  </div>

  </form>
  </div>
  <!-- /#page-wrapper -->



  <!--<div class="container">
    <!-- LOGIN FORM 

    <h1 class="well">Register For New travel agency</h1>
    <div class="col-lg-12 well">
      <div class="row">
        <!-- Main Form 
        <div class="login-form-1">
          <form action="/agency" method="POST">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> {{ csrf_field() }}
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
                  <label for="reg_email" class="sr-only"> agency_province</label>
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
                  <label for="reg_email" class="sr-only">agency_description </label>
                  <input type="text" class="form-control" id="agency_description	" name="agency_description" placeholder="agency_description	">
                </div>
                <div class="form-group login-group-checkbox">
                  <input type="checkbox" class="" id="reg_agree" name="reg_agree">
                  <label for="reg_agree">i agree with
                    <a href="#">terms</a>
                  </label>
                </div>
              </div>
              <input type="hidden" name="user_id" value="{{ $userId }}">
              <button type="submit" class="login-button">สมัครสมาชิก</button>
            </div>
            <div class="etc-login-form">
              <p>already have an account?
                <a href="/login">login here</a>
              </p>
            </div>
          </form>
        </div>
        <!-- end:Main Form 
      </div>
    </div>
</div>-->
</body>