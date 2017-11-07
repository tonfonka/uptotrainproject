@extends('layouts.headIndex') @section('title', 'Search Trip') @section('content')


<!-- Page Content -->
<div class="welcome about" style="padding-top:0px;padding-bottom:0px;">
    <div class="container" align="center">
        <!-- search panel -->
        <div class="newsletter">
            <div class="container">
                <h3 class="agileits-title">Our Tours</h3>
                <form action="searcht" method="post" role="searcht">
                    {{ csrf_field() }}
                    <input type="text" name="q" placeholder="Enter destination..." required="">
                    <input type="submit" value="search">
                    <div class="clearfix"> </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/tether/tether.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
@endsection 
@section('tripuser')
<style>
    /* Image Center Crop Pattern CSS */

    @media only screen and (max-width: 599px) {
        div[class="pattern"] {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 450px;
        }
        div[class="pattern"] img {
            position: absolute;
            top: 0;
            left: 50%;
            margin-left: -300px;
        }
    }
</style>
<section class="bg-light" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-right" style="padding-bottom:30px;">
            @if(isset($details))
                <h4 class="section-heading">{{$details->total()}} total trips</h4>
                <h4>In this page {{$details->count()}} trips</h4>
            </div>
        </div>
 <div class="row">
  <div class="col-lg-12 text-left" style="padding-bottom:30px;">
   <h4 class="section-heading">The Search results for your destination <b> {{ $query }} </b> are :</h4>
  </div>
</div>
        <div class="row">

           @foreach($details as $trips)
                        <?php
                         $a = $trips->travelagency_id;
                         //echo $a ;
                         $t = DB::table('travelagency')->where('id',$a)->get();

                         ?>

            <div class="col-md-4 col-sm-3 portfolio-item">
             
                    <a href="/schedule/{{$trips->id}}" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>

                        <div class="pattern">
                            <img src="/images/{{$trips->image}}" alt="Tattoo &amp; Piercing" width="350" height="250" style="display: block; border: 0;"
                            />

                        </div>

                    </a>
                    <div class="portfolio-caption">
                        <h4>{{str_limit($trips->trips_name, $limit = 35, $end = '....') }}</h4>
                        <p class="text-muted">{{$trips->trip_province}}</p>
                        <a href="/profileagency/{{$trips->travelagency_id}}">
                            <p class="text-muted">โดยบริษัท {{$t[0]->agency_name_en}}</p>
                        </a>
                        @if($trips->trip_nnight > 0)
                        <p class="text-muted">ระยะเวลา {{$trips->trip_nday}} วัน {{$trips->trip_nnight}} คืน</p>
                        @else
                        <p class="text-muted">ระยะเวลา {{$trips->trip_nday}} วัน</p>
                        @endif
                    </div>
            </div>


            @endforeach


        </div>
 @elseif(isset($message))
                    <p>{{ $message }}</p>
                    @endif
    </div>

  

    </div>

</section>


                

    @endsection