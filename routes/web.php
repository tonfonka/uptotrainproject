<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/addtrip','tripAgencyController@index')->middleware('auth');

//Route::post('/addtrip','tripAgencyController@tripstore');
//Route::post('/imagegallery','tripAgencyController@tripstore');
//Route::get('/imagegallery', 'tripAgencyController@imageindex');
//Route::post('/imagegallery','tripAgencyController@tripstore');
//Route::post('/imagegallery', 'ImageGalleryController@imageupload');
//Route::delete('/imagegallery/{id}', 'tripAgencyController@imagedestroy');


Route::get('/agency', 'showtripController@index')->middleware('auth');
Route::post('/agency', 'UserController@regisagency');
//Route::post('/agency','tripAgencyController@tripstore');
Route::post('/image','tripAgencyController@tripstore');
Route::get('/image','imageController@viewimage');
Route::post('/agency','imageController@upload');

Route::get('/agreement',function(){
	return view ('agreement');
});

Route::get('/search', 'UserController@search');
Route::post ( '/searcht', 'UserController@searchResult' );
Route::get('/schedule/{id}','UserController@schedule');
Route::get('/schedules/{id}','UserController@schedules');
Route::get('/booking/{id}','UserController@booking')->middleware('auth');
Route::post('/bookingsum','OmiseController@bookingstore');
Route::get('/bookingsum','OmiseController@bookingsum');
Route::get('/paysum/{id}','OmiseController@bookingsums');
Route::get('/search/index', 'UserController@index');

Route::get('/charge', function () {
	return view ('omisecard');
});

Route::post('/charge','OmiseController@checkout');
Route::get('/card', function () {
	return view ('card');
});
Route::post('/card', 'OmiseController@checkout');
Route::get('/profileuser', function () {
	return view ('profile_user');
});

Route::get('/regisagency','UserController@res');
Route::post('/regisagency','UserController@regisagency');
Route::post('/webhook','OmiseController@webhook');

Route::get('/checkRole', function(){
	if(Auth::guest()){
		return redirect('/home');
	}else{
		if(Auth::user()->role == "admin"){
			return redirect('/home');
		}else if(Auth::user()->role == "travel agency"){
			return redirect('/agency');
		}else if(Auth::user()->role == "user"){
			return redirect('/home');
		}
	}
});
Route::get('/checkregis', function(){
	if(Auth::guest()){
		return redirect('/home');
	}else{
		if(Auth::user()->role == "admin"){
			return redirect('/home');
		}else if(Auth::user()->role == "travel agency"){
			return redirect ('/regisagency');
		}else if(Auth::user()->role == "user"){
			return redirect('/profileuser');
		}
	}
});


Route::get('/tripdetail/{id}','tripAgencyController@showdetailtrip');
Route::get('/hello', function () {
	return view ('error/Brokebot');
});


Route::get('/shownumber/{id}','tripAgencyController@shownumber');

	Route::get('verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
	Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');


	Route::get('/profileuser','UserController@profileuser')->middleware('auth');
	Route::get('/profileusersetting/{id}', 'UserController@profileusersetting');
	Route::get('/comment/{id}','UserController@commenttrip');
	Route::post('/profileuser','UserController@commentstore');
	
	Route::post('/myprofile/{id}','UserController@settingto');

	Route::get('/profileagencysetting', 'UserController@profileagencysetting');
Route::post('/myagency/{id}', 'UserController@profileagencysettingstore');
Route::get('/myagency/{id}', 'UserController@myagency');

	Route::get('/profileagency/{id}', 'tripAgencyController@showAgencyDetail');


	Route::get('/userinfo/{id}', 'tripAgencyController@showuserDetail');
	
	
	
	Route::get('/historytripuser', function () {
			return view('historytripuser');
	});
	
	Route::get('/myprofile/{id}', 'tripAgencyController@myprofile');

	Route::get('/myhistorytrip/{id}', 'UserController@myhistorytripuser');

	Route::get('/pdf/{id}','UserController@pdf');
	Route::get('/statement','tripAgencyController@statement');

