@extends('layouts.agency') 
@section('title', 'Agency') 
@section('agency_banner')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['คะแนนความพึ่งพอใจ', 'Hours per Day'],
            ['1 ดาว',{{$one}}],
            ['2 ดาว',{{$two}}],
            ['3 ดาว',{{$three}}],
            ['4 ดาว',{{$four}}],
            ['5 ดาว',{{$five}}],
        ]);

        var options = {
            
          title: 'คะแนนรวม จากผู้ใช้ทั้งหมด' ,
          pieHole: 0.5,
          slices: {
            0: { color: '#febf05' },
            1: { color: '#feae40' },
            2: { color: '#fe8005' },
            3:{color:'#fe9505'},
            4:{color:'#fe5705'},
          }
          
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
<div class="container">
<div class="row">
<div class="col-sm-12">
<h2>ชื่อทริป {{$trip->trips_name}}</h2>
<hr>
<h3>รีวิวจากผู้ร่วมทริปทั้งหมด :{{$alluser}} คน</h3>
</div><!-- /col-sm-12 -->
</div><!-- /row -->
<div class="row">
<div id="donutchart" style="width: 900px; height: 500px;"></div>
@foreach($review as $reviews)
<?php
    $userName = DB::table('users')->where('id',$reviews->user_id)->get();

?>

@isset($reviews->rate_des)
<div class="col-sm-1">
    <div class="thumbnail">
        <img class="img-responsive user-photo" src="/images/{{$userName[0]->image}}">
    </div><!-- /thumbnail -->
</div><!-- /col-sm-1 -->
    <?php
    $due = $reviews->updated_at;
    ?>
<div class="col-sm-5">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>{{$userName[0]->name}}</strong> <span class="text-muted">     {{\Carbon\Carbon::now('Asia/Bangkok')->createFromFormat('Y-m-d H:i:s', $due)->diffForHumans() }}</span>
            <span style="float:right;">  
            @if(($reviews->rate) =='1')
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            @elseif(($reviews->rate) =='2')
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            @elseif(($reviews->rate) =='3')
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            @elseif(($reviews->rate) =='4')
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            @elseif(($reviews->rate) =='5')
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            <li class="glyphicon glyphicon-star" style="color:yellow" ></li>
            @endif
            </span>
        </div>
        <div class="panel-body">
        {{$reviews->rate_des}}

        </div><!-- /panel-body -->
      <form role="form" action="/review/{{$trip->id}}" method="POST" name="id" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <input type="hidden" name="status" value="{{$reviews->id}}">
      <input type="hidden" name="trip_id" value="{{$trip->id}}">
      <td><button type="submit" class="btn btn-danger" name="status" value="{{$reviews->id}}">Report</button></td>
      </tr>
      </form>

    </div><!-- /panel panel-default -->
</div><!-- /col-sm-5 -->
@endisset
@endforeach
</div><!-- /row -->

</div><!-- /container -->
@endsection