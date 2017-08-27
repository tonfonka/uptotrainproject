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
@endsection @section('tripuser')
</div>
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
                        <a href="#" class="cbp-vm-icon cbp-vm-grid" data-view="cbp-vm-view-grid" title="grid"></a>
                        <a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list"></a>
                    </div>
                    @if(isset($details))
                    <div class="pages">
                        <h4>{{$details->total()}} total trips</h4>
                        <h5>In this page {{$details->count()}} trips</h5>
                    </div>
                    <div class="clearfix"></div>
                    <p> The Search results for your destination <b> {{ $query }} </b> are :</p>
                    <ul>
                        @foreach($details as $user)
                        <li>
                            <a class="cbp-vm-image" href="/schedule/{{$user->id}}">
                                <div class="simpleCart_shelfItem">
                                    <div class="view view-first">
                                        <div class="inner_content clearfix">
                                            <div class="product_image">
                                                <img src="http://placehold.it/500x400" class="img-responsive" alt="" />
                                                <div class="mask">
                                                    <div class="info">Quick View</div>
                                                </div>
                                                <div class="product_container">
                                                    <div class="cart-left">
                                                        <p class="title">{{$user->trips_name}}</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="cbp-vm-details">
                                Kohlrabi bok choy broccoli rabe welsh onion spring onion tatsoi ricebean kombu chard.
                            </div>
                            <a class="cbp-vm-icon cbp-vm-add item_add" href="#">Add to cart</a>
                        </li>
                        @endforeach
                    </ul>

                    @elseif(isset($message))
                    <p>{{ $message }}</p>
                    @endif

                </div>
                <script src="/js/search_tripUser/cbpViewModeSwitch.js" type="text/javascript"></script>
                <script src="/js/search_tripUser/classie.js" type="text/javascript"></script>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

    @endsection