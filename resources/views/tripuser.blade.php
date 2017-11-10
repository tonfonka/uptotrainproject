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

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/vendor/tether/tether.min.js')}}"></script>
    <script src="{{asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
</div>
@endsection @section('tripuser')
<!--<div class="container">
    <link href="/css/search_tripUser/style.css" rel="stylesheet" type="text/css" />
    <link href="/css/search_tripUser/component.css" rel='stylesheet' type='text/css' />
    <div class="container">
        <div class="products-page">
            <div class="new-product">
                <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
                    <div class="cbp-vm-options">
                        <a href="#" class="cbp-vm-grid" data-view="cbp-vm-view-grid" title="grid"></a>
                        <a href="#" class="cbp-vm-list" data-view="cbp-vm-view-list" title="list"></a>
                    </div>
                    <div class="pages">
                        <h4>{{$trips->total()}} total trips</h4>
                        <h5>In this page {{$trips->count()}} trips</h5>
                    </div>
                    <div class="clearfix"></div>
                    <ul>
                        @foreach($trips as $tripuser)
                        <?php
                             $tripagent = DB::table('travelagency')->where('id', $tripuser->travelagency_id)->first();
                            $tripround = DB::table('triprounds')->where('trip_id', $tripuser->id)->get();
                        ?>
                            <li>
                                <a class="cbp-vm-image" href="/schedule/{{$tripuser->id}}">
                                    <div class="simpleCart_shelfItem">
                                        <div class="view view-first">
                                            <div class="inner_content clearfix">
                                                <div class="product_image">
                                                    <img src="/images/{{$tripuser->image}}"class="img-responsive" style="height:180px;width:250px;"></img>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="cbp-vm-details">
                                <p class="title">{{$tripuser->trips_name}}</p>
                                                            <p>จังหวัด {{$tripuser->trip_province}}</p>
                                                            <a href="/profileagency/{{$tripuser->travelagency_id}}">
                                                            <p>บริษัท {{$tripagent->agency_name_en}}</p><br></a>
                                                            @if($tripuser->trip_nnight > 0)
                                                            ระยะเวลา {{$tripuser->trip_nday}} วัน {{$tripuser->trip_nnight}} คืน
                                                            @else
                                                            ระยะเวลา {{$tripuser->trip_nday}} วัน
                                                            @endif
                                </div>
                                <a class="cbp-vm-icon cbp-vm-add item_add" href="/schedule/{{$tripuser->id}}">View Detail</a>
                            </li>
                            @endforeach
                    </ul>
                </div>
                <div align="center">
                    {{$trips->links()}}
                </div>
            </div>
        </div>
    </div>
    <script src="/js/search_tripUser/cbpViewModeSwitch.js" type="text/javascript"></script>
    <script src="/js/search_tripUser/classie.js" type="text/javascript"></script>
</div>
<div class="clearfix"></div>-->

<section class="bg-light" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-right" style="padding-bottom:30px;">
                <h4 class="section-heading">{{$trips->total()}} total trips</h4>
                <h4>In this page {{$trips->count()}} trips</h4>
            </div>
        </div>
<div class="row">
        <div class="row">

            @foreach($trips as $tripuser)

            <div class="col-md-4 col-sm-3 portfolio-item">
                <?php
                             $tripagent = DB::table('travelagency')->where('id', $tripuser->travelagency_id)->first();
                            $tripround = DB::table('triprounds')->where('trip_id', $tripuser->id)->get();
                        ?>
                    <a href="/schedule/{{$tripuser->id}}" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>

                        <div class="pattern">
                            <img src="/images/{{$tripuser->image}}" alt="Tattoo &amp; Piercing" width="350" height="250" style="display: block; border: 0;"
                            />

                        </div>

                    </a>
                    <div class="portfolio-caption">
                        <h4>{{str_limit($tripuser->trips_name, $limit = 35, $end = '....') }}</h4>
                        <p class="text-muted">{{$tripuser->trip_province}}</p>
                        <a href="/profileagency/{{$tripuser->travelagency_id}}">
                            <p class="text-muted">โดยบริษัท {{$tripagent->agency_name_en}}</p>
                        </a>
                        @if($tripuser->trip_nnight > 0)
                        <p class="text-muted">ระยะเวลา {{$tripuser->trip_nday}} วัน {{$tripuser->trip_nnight}} คืน</p>
                        @else
                        <p class="text-muted">ระยะเวลา {{$tripuser->trip_nday}} วัน</p>
                        @endif
                    </div>
            </div>


            @endforeach


        </div>
</div>
    </div>

    <div align="center">
        {{$trips->links()}}
    </div>

    </div>

</section>

@endsection