@extends('layouts.headIndex') 
@section('title', 'Search Trip') 
@section('content')
<style>
body {
    padding: 0 !important 
}
</style>

<!-- Page Content -->
<div class="welcome about" style="padding-top:0px;padding-bottom:0px;">
    <div class="container" align="center">
        <!-- search panel -->
        <div class="newsletter">
            <div class="container">
                <h3 class="agileits-title">Search Attraction</h3>
                <form action="searchp" method="post" role="searchp">
                    {{ csrf_field() }}
                    <input type="text" name="a" placeholder="Enter destination..." required="">
                    <input type="submit" value="search">
                    <div class="clearfix"> </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/vendor/tether/tether.min.js')}}"></script>
<script src="{{asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
@endsection 


@section('tripuser')
<section class="bg-light" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-right" style="padding-bottom:30px;">
                @if(isset($details))
                <h4 class="section-heading">{{$details->total()}} total places</h4>
                <h4>In this page {{$details->count()}} places</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-left" style="padding-bottom:30px;">
                <h4 class="section-heading">The Search results for your destination
                    <b> {{ $query }} </b> are :</h4>
            </div>
        </div>
        <section class="bg-light" id="portfolio">
            <div class="container">
                @foreach($details as $place)
                
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal{{$place->attraction_ID}}">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <!--<img class="img-fluid" src="img/portfolio/04-thumbnail.jpg" alt="">-->
                        <img src="/images/attraction/{{$place->Attraction_pic}}" alt="Tattoo &amp; Piercing" width="350" height="250" style="display: block; border: 0;" />
                    </a>
                    <div class="portfolio-caption">
                        <h4>{{str_limit($place->attraction_Name, $limit = 35, $end = '....')}} </h4>
                        <p class="text-muted">{{$place->Attraction_Province}}</p>
                    </div>
                </div>
                
                <div class="portfolio-modal modal fade" id="portfolioModal{{$place->attraction_ID}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-dismiss="modal">
                                <div class="lr">
                                    <div class="rl"></div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 mx-auto">
                                        <div class="modal-body">
                                            <!-- Project Details Go Here -->
                                            <h2>{{$place->attraction_Name}}</h2>
                                            <p class="item-intro text-muted">อำเภอ {{$place->Attraction_tambon}} จังหวัด {{$place->Attraction_Province}}</p>
                                            <img class="img-fluid d-block mx-auto" src="/images/attraction/{{$place->Attraction_pic}}" alt="">
                                            <p>{{$place->attraction_Description}}</p>
                                            <ul class="list-inline">
                                                <li>เวลาเปิดทำการ : {{$place->attraction_Time_Open}}</li>
                                                <li>เวลาปิดทำการ : {{$place->Attraction_Time_Closed}}</li>
                                                <li>เบอร์โทรศัพท์ติดต่อ : {{$place->Attraction_Tel}}</li>
                                            </ul>
                                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                                <i class="fa fa-times"></i>
                                                Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                    </div>
                </div>

                @endforeach 
                 @elseif(isset($message))
                <p>{{ $message }}</p>
                @endif
            </div>
        </section>
    </div>
</section>



@endsection