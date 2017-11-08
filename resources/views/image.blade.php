<html>

<head>
    <meta charset="utf-8">
    <title>Up To train</title>
    <!-- Bootstrap Core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Custom Fonts -->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- เปิดแล้ว Theme CSS -->
    <link href="/css/uptotrain2.min.css" rel="stylesheet"/>
   <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet"/>

    
</head>
<body id="page-top" class="index">
    <div align="right">
        <a class="btn btn-primary" href={{ url( '/agency') }} style="
    padding-top: 12px;
    padding-bottom: 12px;
    padding-left: 15px;
    padding-right: 15px;background-color:#fff;border-color:#fff;
"><i class="fa fa-times" style="color:#000000;font-size:50px;"></i></a>
    </div>
    <div class="container" id="about" align="center">
        <div class="row">
            <!-- Project Details Go Here -->
           <?php
              $schedule = DB::table('schedules')->where('trip_id',$tripId)->get();
           ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">เพิ่มรูปสถานที่ท่องเที่ยว</h2>
                    </div>
                </div>
                <div class="row">
                    <form role="form" action="/agency" method="POST" name="id" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                       <table class ="table">
                       <tr>
                       <td>ชื่อสถานที่</td>
                       <td>เพิ่มรูปกิจกรรม</td>
                       </tr>
                       @foreach($schedule as $schedules)
                        <tr>
                        
                        <td>
                        <input type="hidden" id ="trip_id" name="trip_id" value="{{$tripId}}">
                        {{$schedules->schedule_place}}
                        </td>
                        <td><input type="file" id ="image" name="image[]" multiple></td>
                        
                        </tr>
                      @endforeach
                        </table>
                        <button type="submit"  class="btn btn-primary">ยืนยันการสร้างทริป</button>
                    </form>
                </div>
                <br><br>
        
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

   
</body>

</html>