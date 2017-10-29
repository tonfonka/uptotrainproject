@extends('layouts.agency2') 
@section('title', 'Agency') 
@section('content')
<link href="{{ URL::asset('/css/profile/blogttc.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('/css/profile_setting/navbar-affix.css') }}" rel="stylesheet" type="text/css" />

<body data-spy="scroll" data-target=".scrollspy">
    <br>
    <div class="container">
	    <div class="row">
        
        <div class="col-md-11">
          <div class="row">
            <div class="col-md-3">
              <section id="edit-avatar" style="height:200px;">
                <div class="text-center">
                  <img src="/images/{{Auth::user()->image}}" alt="" width="150" class="avatar img-circle" alt="avatar">
                </div>
                <center><label>username</label></center>
                
              </section>
            </div>
            <div class="col-md-9">
              <p style="font-size:30px;color:black;">ชื่อ : อธิวัชร์ แสงแก้ว</p>
              <div class="row">
                <div class="col-md-6">
                  <p style="font-size:30px;color:black;">เพศ : ชาย </p>
                  <p style="font-size:30px;color:black;">เบอร์ติดต่อ : 0874444444 </p>
                </div>
                <div class="col-md-6">
                <p style="font-size:30px;color:black;">อายุ : 22 คำนวนจากวันเกิดเพราะมันเปลี่ยนเรื่อยๆ </p>
                <p style="font-size:30px;color:black;">อีเมลล์ : ed@gmail.com </p>
                </div>
              </div>
             
              
                
            </div>
          </div>
          <div class="row">
          
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