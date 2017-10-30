@extends('layouts.headprofile') @section('title', 'profile') @section('content')

<link href="{{asset('css/profile/blogttc.css')}}" rel="stylesheet" type="text/css"/>


<div class="container">
	<div class="blog-page blog-content-1">
		<div class="row">
			<div class="col-md-12" style="padding-top: 50px">
        <h2>ทริปที่ผ่านมาแล้ว</h2>
        <div class="col-md-4" style="padding:10px;border: 25px solid green;">
          <div class="product_image">
          <img src="/images/8.jpg"class="img-responsive" style="height:200px;width:300px;background-position: center center; background-repeat: no-repeat;
"></img>
          </div>
        </div>
        

      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
});
</script>
@endsection