@extends('layouts.headprofile') @section('title', 'profile') @section('content')
<style>
	hr {
		border-color: darkred;
	}
</style>
<link href="{{asset('css/profile/blogttc.css')}}" rel="stylesheet" type="text/css" />
<style>

.card .card-image{
    overflow: hidden;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    -o-transform-style: preserve-3d;
    transform-style: preserve-3d;
}

.card .card-image img{
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    -ms-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.card .card-image:hover img{
    -webkit-transform: scale(1.2) rotate(-7deg);
    -moz-transform: scale(1.2) rotate(-7deg);
    -ms-transform: scale(1.2) rotate(-7deg);
    -o-transform: scale(1.2) rotate(-7deg);
    transform: scale(1.2) rotate(-7deg);
}

.card{
    font-family: 'Prompt', sans-serif; 
    margin-top: 10px;
    position: relative;
    -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  -moz-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  box-shadow: 4 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
}

.card .card-content {
    padding: 10px;    
}

.card .card-content .card-title, .card-reveal .card-title{
    font-size: 24px;
    font-weight: 200;    
}

.card .card-action{
    padding: 20px;
    border-top: 1px solid rgba(160, 160, 160, 0.2);
}
.card .card-action a{
    font-size: 15px;
    color: #ffab40;
    text-transform:uppercase;
    margin-right: 20px;    
    -webkit-transition: color 0.3s ease;
    -moz-transition: color 0.3s ease;
    -o-transition: color 0.3s ease;
    -ms-transition: color 0.3s ease;
    transition: color 0.3s ease;
}
.card .card-action a:hover{    
    color:#ffd8a6;
    text-decoration:none;
}

.card .card-reveal{    
    padding: 20px;
    position: absolute;
    background-color: #FFF;
    width: 100%;
    overflow-y: auto;
    /*top: 0;*/
    left:0;
    bottom:0;
    height: 100%;
    z-index: 1;
    display: none;    
}

.card .card-reveal p{
    color: rgba(0, 0, 0, 0.71);
    margin:20px ;
}

.btn-custom{
    background-color: transparent;
    font-size:18px;
}

</style>
@foreach($userbook as $book)
<?php
    $today = date('y/m/d'); 
    $round = DB::table('triprounds')->where([['id',$book->tripround_id],['start_date','>',$today]])->orderBy('start_date','asc')->get();
    $roundId = DB::table('triprounds')->select('trip_id')->where('id',$book->tripround_id)->orderBy('start_date','asc')->pluck('trip_id');
    $tripname = DB::table('trips')->where('id',$roundId)->get();
?>
<div class="container">
  
<div class="row">    
        <div class="col-md-6 ">
            <div class="card">
                <div class="card-image">
                    <img class="img-responsive" src="/images/{{$tripname[0]->image}}">
                    
                </div><!-- card image -->
                
                <div class="card-content">
                <a href="/schedules/{{$tripname[0]->id}}" ><span class="card-title">{{$tripname[0]->trips_name}}</span>                    
                    <button type="button" id="show" class="btn btn pull-right" aria-label="Left Align">
                        <i class="fa fa-ellipsis-v">Detail</i>
                    </button>
                </div><!-- card content -->
                <div class="card-action">
                    <a href="/schedules/{{$tripname[0]->id}}" >{{$tripname[0]->trip_description}}</a>
                </div><!-- card actions -->
                <div class="card-reveal">
                    <span class="card-title">รายละเอียด</span> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                   <a href="/schedules/{{$tripname[0]->id}}"> <p>ชื่อทริป : {{$tripname[0]->trips_name}}</p></a>
                    <p>วันเริ่มเดินทาง : {{$round[0]->start_date}}</p>
                    <p>วันสิ้นสุดการเดินทาง :{{$round[0]->departure_date}} </p>
                    <a href="/paysum/{{$book->id}}" ><p>จำนวนคนที่จอง : {{$book->number_booking}}</p></a>
                    <p>วันเวลาที่จอง :  {{$book->booking_time}}</p>
                    
                </div><!-- card reveal -->
            </div>
        </div>
    </div>

</div>
@endforeach
<script>
$(function(){

    $('#show').on('click',function(){        
        $('.card-reveal').slideToggle('slow');
    });
    
    $('.card-reveal .close').on('click',function(){
        $('.card-reveal').slideToggle('slow');
    });
});
</script>



@endsection