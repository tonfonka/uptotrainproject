@extends('layouts.headprofile2') @section('title', 'History Trip') @section('content')
<link href=" {{ URL::asset('/css/codebox/style.css') }}" rel="stylesheet"/>
<div class="container">
  <div class="cards-2">
    <div class="card-2">
      <img src="/img/g5.jpg">
      <div class="card-title">
        <a href="#" class="toggle-info btn-2">
          <span class="left"></span>
          <span class="right"></span>
        </a>
        <h2>
          $ชื่อทริป
          <small>$ชื่อบริษัท</small>
          <small>$วันที่ไป-วันที่กลับ</small>
        </h2>
      </div>
      <div class="card-flap flap1">
        <div class="card-description">
          $คำอธิบายทริป
        </div>
        <div class="card-flap flap2">
          <div class="card-actions">
            <a href="#" class="btn-2">view</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{asset('/js/codebox/index.js')}}"></script>


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>

@endsection