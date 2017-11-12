@extends('layouts.headprofile') @section('title', 'profile') @section('content')
<style>
    hr {
        border-color: darkred;
    }
</style>
<link href="{{asset('css/profile/blogttc.css')}}" rel="stylesheet" type="text/css" />
<style>
    .card .card-image {
        overflow: hidden;
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        -ms-transform-style: preserve-3d;
        -o-transform-style: preserve-3d;
        transform-style: preserve-3d;
    }

    .card .card-image img {
        -webkit-transition: all 0.4s ease;
        -moz-transition: all 0.4s ease;
        -ms-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        transition: all 0.4s ease;
    }


    .card {
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

    .card .card-content .card-title,
    .card-reveal .card-title {
        font-size: 24px;
        font-weight: 200;
    }

    .card .card-action {
        padding: 20px;
        border-top: 1px solid rgba(160, 160, 160, 0.2);
    }

    .card .card-action a {
        font-size: 15px;
        color: #ffab40;
        text-transform: uppercase;
        margin-right: 20px;
        -webkit-transition: color 0.3s ease;
        -moz-transition: color 0.3s ease;
        -o-transition: color 0.3s ease;
        -ms-transition: color 0.3s ease;
        transition: color 0.3s ease;
    }

    .card .card-action a:hover {
        color: #ffd8a6;
        text-decoration: none;
    }

    .card .card-reveal {
        padding: 20px;
        position: absolute;
        background-color: #FFF;
        width: 100%;
        overflow-y: auto;
        /*top: 0;*/
        left: 0;
        bottom: 0;
        height: 100%;
        z-index: 1;
        display: none;
    }

    .card .card-reveal p {
        color: rgba(0, 0, 0, 0.71);
        margin: 20px;
    }

    .btn-custom {
        background-color: transparent;
        font-size: 18px;
    }
</style>

<div class="container">
    <div class="blog-page blog-content-1">
        <div class="row">
            <div class="col-md-12" style="padding-top: 50px;">
                <h2>กิจกรรมของฉัน</h2>

                <div class="row" style="
    padding-bottom: 50px;
    padding-top: 50px;">
                    @foreach($userbook as $book)
                    <?php
    $today = date('y/m/d'); 
    $round = DB::table('triprounds')->where([['id',$book->tripround_id],['start_date','>',$today]])->orderBy('start_date','asc')->get();
    $roundId = DB::table('triprounds')->select('trip_id')->where('id',$book->tripround_id)->orderBy('start_date','asc')->pluck('trip_id');
    $tripname = DB::table('trips')->where('id',$roundId)->get();
    $co = $round->count();
        ?>
                        @if($co >0)
                        <div class="col-md-4 ">
                            <div class="card">
                                <div class="card-image">
                                    <img class="responsive" height="250" src="/images/{{$tripname[0]->image}}">
                                </div>
                                <!-- card image -->

                                <div class="card-content">
                                    <a href="/schedules/{{$tripname[0]->id}}">
                                        <span class="card-title">{{str_limit($tripname[0]->trips_name, $limit = 27, $end = '....') }}</span>
                                    </a>


                                </div>
                                <!-- card content -->
                                <div class="card-action">
                                    <a href="/schedules/{{$tripname[0]->id}}">{{str_limit($tripname[0]->trip_description, $limit = 30, $end = '....') }}
                                    </a>
                                    <button type="button" data-id="show" class="btn btn pull-right" aria-label="Left Align" value="show">
                                        Detail
                                    </button>
                                </div>
                                <!-- card actions -->
                                <div class="card-reveal">
                                    <span class="card-title">รายละเอียด</span>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                   
                                        <p> <a href="/schedules/{{$tripname[0]->id}}">ชื่อทริป : {{$tripname[0]->trips_name}} </a></p>
                                   
                                    <p>วันเริ่มเดินทาง : {{date('d/m/Y', strtotime($round[0]->start_date))}}</p>
                                    <p>วันสิ้นสุดการเดินทาง :{{date('d/m/Y', strtotime($round[0]->departure_date))}}</p>
                                    
                                        <p><a href="/paysum/{{$book->id}}">จำนวนคนที่จอง : {{$book->number_booking}} </a></p>
                                   
                                    <p>วันเวลาที่จอง : {{date('d/m/Y', strtotime($book->booking_time))}}</p>
                                    <p><a href="/schedulepdf/{{$tripname[0]->id}}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  พิมพ์ตารางกิจกรรม</a></p>
                                </div>
                                <!-- card reveal -->
                            </div>
                        </div>
                        @endif @endforeach
                        <script>
                            $(function () {
                                $('[data-id="show"], .close').on('click', function () {
                                    $(this).closest('.card').find('.card-reveal').slideToggle(
                                        'slow');
                                });

                            });
                        </script>
                        <script src="{{asset('/js/jquery-2.2.3.min.js')}}"></script>

                </div>
             
            </div>
        </div>
    </div>
</div>







@endsection