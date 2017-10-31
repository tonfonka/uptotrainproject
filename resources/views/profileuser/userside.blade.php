@extends('layouts.headprofile') @section('title', 'profile') @section('content')
<link href="{{ URL::asset('/css/profile/blogttc.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('/css/profile_setting/navbar-affix.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body data-spy="scroll" data-target=".scrollspy">
    <br>
    <div class="container">
	    <div class="row">
        <div class="col-md-12">
          <div class="row">
            <p style="font-size:40px;color:black;font-family:'Prompt', sans-serif;"><i class="fa fa-address-card"></i> ข้อมูลส่วนตัว</p><br>
          </div>
          <div class="row">
            <div class="col-md-2">
              <section id="edit-avatar" style="height:200px;">
                <div class="text-center">
                  <img src="/images/{{Auth::user()->image}}" alt="" width="150" class="avatar img-circle" alt="avatar">
                </div>
                <center><label>{{Auth::user()->name}}</label></center>
              </section>
            </div>
            <div class="col-md-10">
              <p style="font-size:25px;color:black;">ชื่อ : {{Auth::user()->firstname}}</p>
              <div class="row">
                <div class="col-md-6">
                  <p style="font-size:25px;color:black;">เพศ : {{Auth::user()->sex}}</p>
                  <p style="font-size:25px;color:black;">เบอร์ติดต่อ : {{Auth::user()->phone}} </p>
                  <p style="font-size:25px;color:black;">โรคประจำตัว : {{Auth::user()->chronic_disease}} </p>
                </div>
                <div class="col-md-6">
                <p style="font-size:25px;color:black;">อายุ : {{Auth::user()->age}}  </p>
                <p style="font-size:25px;color:black;">อีเมลล์ : {{Auth::user()->email}} </p>
                <p style="font-size:25px;color:black;">อาหารที่แพ้ : {{Auth::user()->food_allergy}}	 </p>
                </div>
              </div> 
            </div>
          </div>
          <div class="row">
            <div class = "col-md-12">
              <p style="font-size:25px;color:black;">ที่อยู่ : {{Auth::user()->address}}</p>
            </div>
          </div>
          <div class="row">
            <div class = "col-md-6">
              <p style="font-size:25px;color:black;">จังหวัด :{{Auth::user()-> province}}	</p>
            </div>
            <div class = "col-md-6">
              <p style="font-size:25px;color:black;">รหัสไปรษณีย์ : {{Auth::user()->zipcode}}</p>
            </div>    
          </div>
      </div>
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
      
</body>

@endsection