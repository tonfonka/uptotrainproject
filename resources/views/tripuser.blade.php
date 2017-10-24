@extends('layouts.headIndex') 
@section('title', 'Search Trip') 
@section('content')


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
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/tether/tether.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
@endsection 
@section('tripuser')
<div class="container">
    <link href="/css/search_tripUser/style.css" rel="stylesheet" type="text/css" />
    <link href="/css/search_tripUser/component.css" rel='stylesheet' type='text/css' />
    <div class="container">
        <div class="products-page">
            <div class="products">
                <div class="product-listy">
                    <h2>All trips</h2>
                    <ul class="product-list">
                        <li><a href="">New Trips</a></li>
                        <li><a href="">Available Tour</a></li>
                        <li><a href="">Hot Price</a></li>
                    </ul>
                </div>
                
            </div>
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
                        @foreach($trips as $tripuser )
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
                                                    <img src="/images/{{$tripuser->image}}" class="img-responsive" alt="" style='width: 300px; height:200px;' />
                                                   
                                                    <div class="product_container">
                                                        <div class="cart-center">
                                                            
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
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
                                                            
                                    <p>{{$tripuser->trip_description}}</p>
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
<div class="clearfix"></div>
@endsection
