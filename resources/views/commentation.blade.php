@extends('layouts.headprofile') 
@section('title', 'profile') 
@section('content')

<link href="{{asset('/css/profile/blogttc.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset('/css/rating.css')}}"/>

			<div class="container">
	
		<div class="row travelo-box">
				<h2>กิจกรรมเมื่อเร็วๆนี้</h2>
				<div class="stars">
        <form role="form" action="/profileuser" method="POST" name="id" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<h4>{{$tripname->trips_name}}</h4>

							
                  <input class="star star-5" id="star-5" type="radio" name="rate" value="5"/>
                  <label class="star star-5" for="star-5"></label>
                 <input class="star star-4" id="star-4" type="radio" name="rate" value="4"/>
                  <label class="star star-4" for="star-4"></label>
                  <input class="star star-3" id="star-3" type="radio" name="rate" value="3"/>
                  <label class="star star-3" for="star-3"></label>
                  <input class="star star-2" id="star-2" type="radio" name="rate" value="2"/>
                  <label class="star star-2" for="star-2"></label>
                  <input class="star star-1" id="star-1" type="radio" name="rate" value="1"/>
                  <label class="star star-1" for="star-1"></label>
        </div>       
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Re view Trip</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name ="des" rows="3"></textarea>

                  </div>
                  <input type="hidden" name="trip_id" value="{{ $tripname->id}}">
					<button type="submit">กด</button>
				</form>
				</div>
			</div>

		
		
		
@endsection





















