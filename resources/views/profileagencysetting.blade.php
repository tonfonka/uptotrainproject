@extends('layouts.agency2') 
@section('title', 'Agency') 
@section('content')
<link href="{{ URL::asset('/css/profile/blogttc.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('/css/profile_setting/navbar-affix.css') }}" rel="stylesheet" type="text/css" />

<body data-spy="scroll" data-target=".scrollspy">
    <br>
    <div class="container">
      <div class="row ">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <div class="row">

              <div class="col-md-6">
                <h6>Upload a different photo...</h6>
                <div>
                  <span class="btn default btn-file">
                  <input type="file" name="image" id="image" > </span>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>เกี่ยวกับบริษัท</label>
                  <textarea class="form-control" id="agency_description" name="agency_description" rows="3"></textarea>
                </div> 
              </div>

            </div>

            <div class="row">

              <div class="col-md-12">
              
              <h2><span class="fa fa-edit"></span>ข้อมูลบริษัท</h2>

                <div class="form-group">
                  <label>ที่อยู่</label>
                  <input class="form-control" type="text" name="agency_address" id ="agency_address" value="">
                </div>

                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>จังหวัด</label>
                        <input class="form-control" type="text" name="agency_province" id ="agency_province" value="">
                      </div>
                      <div class="form-group">
                        <label>เบอร์โทรศัพท์ 1</label>
                        <input class="form-control" type="text" name="agency_tel1" id ="agency_tel1" value="">
                      </div>
                      <div class="form-group">
                        <label>Fax</label>
                        <input class="form-control" type="text" name="agency_fax" id ="agency_fax" value="">
                      </div>
                      <div class="form-group">
                        <label>Website</label>
                        <input class="form-control" type="text" name="agency_web" id ="agency_web" value="">
                      </div>
                      <div class="form-group">
                        <label>IATA code</label>
                        <input class="form-control" type="text" name="agency_iata_no" id ="agency_iata_no" value="">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>รหัสไปรษณีย์</label>
                        <input class="form-control" type="text" name="agency_zipcode" id ="agency_zipcode" value="">
                      </div>
                      <div class="form-group">
                        <label>เบอร์โทรศัพท์ 2</label>
                        <input class="form-control" type="text" name="agency_tel2" id ="agency_tel2" value="">
                      </div>
                      <div class="form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="text" name="agency_email" id ="agency_email" value="">
                      </div>
                      <div class="form-group">
                        <label>Facebook</label>
                        <input class="form-control" type="text" name="agency_fb" id ="agency_fb" value="">
                      </div>
                      <div class="form-group">
                        <label>เลขประจำตัวผู้เสียภาษีอากร</label>
                        <input class="form-control" type="text" name="agency_tax_id	" id ="agency_tax_id" value="">
                      </div> 
                  </div>
                
                </div>
                <br>
                <center>
                <button type="button" class="btn btn-success btn-lg"> บันทึก</button>
                <button type="button" class="btn btn-danger btn-lg"> ยกเลิก</button>
                </center>
              </div>
            </div>
        </div>
        <div class="col-md-1"></div>
      </div>
    </div>


	
  
    
  
  
  

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
      <center><h1>อย่าลืมใส่ footer ด้วย จาก Ed</h1></center>
</body>

@endsection