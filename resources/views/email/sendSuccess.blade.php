<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>UP TO TRAIN</title>
 
 <link href="{{ URL::asset('/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet" >
      <link rel="stylesheet" href="{{URL::asset('/css/success/success.css')}}" >

  
</head>

<body>
  <div class="background"></div>
<div class="container">
		<div class="row">
				<div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
						<div class="icon">
								<span class="glyphicon glyphicon-ok"></span>
						</div>
						<!--/.icon-->
						<h1>Success!</h1>
						<p>ยืนยันตัวตนสำเร็จแล้ว ยินดีต้อนรับเข้าสู่ระบบ 
								<br>โปรดล็อกอินเพื่อดำเนินการ</p>
						<a href="{{route('login')}}"><button type="button" class="redo btn">Ok</button></a>
					<span class="change">-- UP TO TRAIN --</span>
				</div>
				<!--/.success-->
		</div>
		<!--/.row-->
</div>
<!--/.container-->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

 

</body>
</html>


