@extends('layouts.headIndex') @section('title', 'Search Trip') @section('content')


<!-- Page Content -->
<div class="welcome about" style="padding-top:0px;padding-bottom:0px;">
  <div class="container" align="center">
    <!-- search panel -->
    <div class="newsletter">
      <div class="container">
        <h3 class="agileits-title">Search Attraction</h3>
        <form action="searchp" method="post" role="searcht">
          {{ csrf_field() }}
          <input type="text" name="p" placeholder="Enter destination..." required="">
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
<section class="bg-light" id="portfolio">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-right" style="padding-bottom:30px;">
<h4 class="section-heading">{{$place->total()}} total places</h4>
                <h4>In this page {{$place->count()}} places</h4>
      </div>
    </div>
    <section class="bg-light" id="portfolio">
      <div class="container">
       @foreach($place as $p)
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal{{$p->id}}">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <!--<img class="img-fluid" src="img/portfolio/04-thumbnail.jpg" alt="">-->
              <img src="/images/" alt="Tattoo &amp; Piercing" width="350" height="250" style="display: block; border: 0;" />
            </a>
            <div class="portfolio-caption">
              <h4>{{str_limit($p->attraction_Name, $limit = 35, $end = '....')}} </h4>
                        <p class="text-muted">{{$p->Attraction_Province}}</p>
            </div>
          </div>
        @endforeach
        @foreach($place as $p)
  <!-- Modal 1 -->
  <div class="portfolio-modal modal fade" id="portfolioModal{{$p->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                <h2>{{$p->attraction_Name}}</h2>
                <p class="item-intro text-muted">อำเภอ {{$p->Attraction_City}} จังหวัด {{$p->Attraction_Province}}</p>
                <img class="img-fluid d-block mx-auto" src="" alt="">
                <p>{{$p->attraction_Description}}</p>
                <ul class="list-inline">
                  <li>เวลาเปิดทำการ : attraction_Time_Open</li>
                  <li>เวลาปิดทำการ : Attraction_Time_Closed</li>
                  <li>เบอร์โทรศัพท์ติดต่อ : Attraction_Tel</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fa fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach
      </div>
    </section>
  </div>






  <div align="center">
{{$place->links()}}
  </div>



</section>
</body>
@endsection