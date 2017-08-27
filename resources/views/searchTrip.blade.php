@extends('layouts.headuser') 
@section('title', 'Search Trip') 
@section('content')

<div class="newsletter">
  <div class="container">
    <h3 class="agileits-title">Our Tours</h3>
    <form action="#" method="post">
      <input type="text" name="text" placeholder="Enter destination..." required="">
      <input type="submit" value="search">
      <div class="clearfix"> </div>
    </form>
  </div>
</div>

<div class="container">
  <div class="gallery_gds">
    <ul class="simplefilter">
      <li class="active" data-filter="all">All</li>
      <li data-filter="1">ภาคเหนือ</li>
      <li data-filter="2">ภาคกลาง</li>
      <li data-filter="3">ภาคอีสาน</li>
      <li data-filter="3">ภาคใต้</li>
    </ul>
    <div class="filtr-container">
      <div class="col-md-4 col-sm-4 filtr-item" data-category="1" data-sort="Busy streets">
        <div class="agileits-img">
          <a href="img/img1.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
								<img class="img-responsive" src="img/img1.jpg" alt=""  /> 
							</a>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 filtr-item" data-category="2, 3" data-sort="Luminous night">
        <div class="agileits-img">
          <a href="img/g2.jpg" class="swipebox" title="Duis maximus tortor diam, ac lobortis justo rutrum quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non purus fermentum, eleifend velit non">
								<img src="img/g2.jpg" alt="" class="img-responsive" />
							</a>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 filtr-item" data-category="1" data-sort="City wonders">
        <div class="agileits-img">
          <a href="img/g3.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
								<img src="img/g3.jpg" alt="" class="img-responsive" />
							</a>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 filtr-item" data-category="3" data-sort="Industrial site">
        <div class="agileits-img">
          <a href="img/g4.jpg" class="swipebox" title="Praesent non purus fermentum, eleifend velit non Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis.">
								<img src="img/g4.jpg" alt="" class="img-responsive" />
							</a>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 filtr-item" data-category="3" data-sort="In production">
        <div class="agileits-img">
          <a href="img/g5.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
								<img src="img/g5.jpg" alt="" class="img-responsive" />
							</a>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 filtr-item" data-category="2" data-sort="Peaceful lake">
        <div class="agileits-img">
          <a href="img/img2.jpg" class="swipebox" title="Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
								<img src="img/img2.jpg" alt="" class="img-responsive" />
							</a>
        </div>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
</div>



@endsection('content')