@extends('layouts.agency') 
@section('title', 'Setting') 
@section('content')
<link href="{{ asset('/css/profile/blogttc.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/profile_setting/navbar-affix.css') }}" rel="stylesheet" type="text/css" />
<body data-spy="scroll" data-target=".scrollspy">
  <div class="container">
    <div class="row">
      <div class="col-md-3 scrollspy">
        <ul id="nav" class="nav hidden-xs hidden-sm" data-spy="affix" data-offset-top="60" data-offset-bottom="200">
          <li>
            <a href="#edit-logo">รูป</a>
          </li>
          <li>
            <a href="#agency-info">ข้อมูลบริษัท</a>
          </li>

        </ul>
      </div>


      <form class="form-horizontal" role="form" action="/myagency/{{Auth::user()->id}}" method="POST" name="id" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="col-md-9">
          <section id="edit-logo" style="height:300px;">
            <h2>{{$agency[0]->agency_name_th}}</h2>
            <h2>{{$agency[0]->agency_name_en}}</h2>
            <h2>
              <span class="fa fa-edit"></span> โลโก้</h2>
            <div class="col-md-6">
              <div class="text-center">
                <img src="/images/{{Auth::user()->image}}" alt="" width="150" class="avatar img-circle" alt="avatar">
                <br>
                <br>
                <h6>Upload a different photo...</h6>
                <div>
                  <span class="btn default btn-file">
                    <input type="file" name="image" id="image">
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>เกี่ยวกับบริษัท</label>
                <textarea class="form-control" id="agency_description" name="agency_description" rows="3">{{$agency[0]->agency_description}}</textarea>
              </div>
            </div>
          </section>

          <section id="agency-info">
            <div class="row">
              <div class="col-md-12">
                <h2>
                  <span class="fa fa-edit"></span>ข้อมูลบริษัท</h2>
                <div class="form-group">
                  <label>ที่อยู่</label>
                  <input class="form-control" type="text" name="agency_address" id="agency_address" value="{{$agency[0]->agency_address}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label>จังหวัด</label>
                  <input class="form-control" type="text" name="agency_province" id="agency_province" value="{{$agency[0]->agency_province}}">
                </div>
                <div class="form-group">
                  <label>เบอร์โทรศัพท์ 1</label>
                  <input class="form-control" type="text" name="agency_tel1" id="agency_tel1" value="{{$agency[0]->agency_tel1}}">
                </div>
                <div class="form-group">
                  <label>Fax</label>
                  <input class="form-control" type="text" name="agency_fax" id="agency_fax" value="{{$agency[0]->agency_fax}}">
                </div>
                <div class="form-group">
                  <label>Website</label>
                  <input class="form-control" type="text" name="agency_web" id="agency_web" value="{{$agency[0]->agency_web}}">
                </div>
                <div class="form-group">
                  <label>IATA code</label>
                  <input class="form-control" type="text" name="agency_iata_no" id="agency_iata_no" value="{{$agency[0]->agency_iata_no}}">
                </div>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>รหัสไปรษณีย์</label>
                  <input class="form-control" type="text" name="agency_zipcode" id="agency_zipcode" value="{{$agency[0]->	agency_zipcode}}">
                </div>
                <div class="form-group">
                  <label>เบอร์โทรศัพท์ 2</label>
                  <input class="form-control" type="text" name="agency_tel2" id="agency_tel2" value="{{$agency[0]->agency_tel2}}">
                </div>
                <div class="form-group">
                  <label>E-mail</label>
                  <input class="form-control" type="text" name="agency_email" id="agency_email" value="{{$agency[0]->agency_email}}">
                </div>
                <div class="form-group">
                  <label>Facebook</label>
                  <input class="form-control" type="text" name="agency_fb" id="agency_fb" value="{{$agency[0]->agency_fb}}">
                </div>
                <div class="form-group">
                  <label>เลขประจำตัวผู้เสียภาษีอากร</label>
                  <input class="form-control" type="text" name="agency_tax_id" id="agency_tax_id" value="{{$agency[0]->agency_tax_id}}">
                </div>
              </div>
            </div>
            <br>
            <center>
              <button type="submit" class="btn btn-success btn-lg"> บันทึก</button>
              <button type="/agency" class="btn btn-danger btn-lg"> ยกเลิก</button>
            </center>
          </section>
        </div>
    </div>
  </div>
  <div class="col-md-1"></div>
</body>
@endsection