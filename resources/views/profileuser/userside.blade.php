@extends('layouts.headprofile') @section('title', 'profile') @section('content')
<link href="{{ URL::asset('/css/profile/blogttc.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('/css/profile_setting/navbar-affix.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <p style="font-size:40px;color:black;font-family:'Prompt', sans-serif;">
          <i class="fa fa-address-card"></i> ข้อมูลลูกค้า</p>
        <br>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="text-center">
        <div style="object-fit: cover;">
          <img src="/images/{{$user[0]->image}}" alt="" width="250" class="avatar img-circle" alt="avatar">
        </div>
      </div>
      <center>
        <label>{{$user[0]->name}}</label>
      </center>
    </div>
    <div class="col-md-8">
      <p style="font-size:25px;color:black;">ชื่อ : {{$user[0]->firstname}} {{$user[0]->lastname}}</p>
      <div class="row">
        <div class="col-md-6">
          <p style="font-size:25px;color:black;">เพศ : {{$user[0]->sex}} </p>
          <p style="font-size:25px;color:black;">เบอร์ติดต่อ : {{$user[0]->phone}} </p>
          <p style="font-size:25px;color:black;">โรคประจำตัว : {{$user[0]->chronic_disease}} </p>
        </div>
        <div class="col-md-6">
          <p style="font-size:25px;color:black;">อายุ : {{$user[0]->age}} </p>
          <p style="font-size:25px;color:black;">อีเมลล์ : {{$user[0]->email}} </p>
          <p style="font-size:25px;color:black;">อาหารที่แพ้ : {{$user[0]->food_allergy}} </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p style="font-size:25px;color:black;">ที่อยู่ : {{$user[0]->address}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <p style="font-size:25px;color:black;">จังหวัด : {{$user[0]->province}} </p>
        </div>
        <div class="col-md-6">
          <p style="font-size:25px;color:black;">รหัสไปรษณีย์ : {{$user[0]->zipcode}}</p>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script>
  $(function () {
    $('#nav').affix({
      offset: {
        top: 180,
        bottom: function () {
          return (this.bottom = $('.footer').outerHeight(true))
        }
      }
    })
  })
</script>

@endsection