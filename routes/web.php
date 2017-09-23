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
Route::post('/imagegallery','tripAgencyController@tripstore');
Route::get('/imagegallery', 'tripAgencyController@imageindex');
Route::post('/imagegallery','tripAgencyController@tripstore');
//Route::post('/imagegallery', 'ImageGalleryController@imageupload');
Route::delete('/imagegallery/{id}', 'tripAgencyController@imagedestroy');


Route::get('/agency', 'showtripController@index')->middleware('auth');
Route::post('/agency', 'UserController@regisagency');
Route::post('/agency','tripAgencyController@imageupload');





Route::get('/agreement',function(){
	return view ('agreement');
});

Route::get('/search', 'UserController@search');
Route::post ( '/searcht', function () {
	$q = Input::get ( 'q' );
	$user = DB::table('trips')
	->where ( 'trips_name', 'LIKE', '%' . $q . '%' )->paginate(15);;
	if (count ( $user ) > 0)
		return view ( 'tripuser_resultsearch' )->withDetails ( $user )->withQuery ( $q );
	else
		return view ( 'tripuser_resultsearch' )->withMessage ( 'No Details found. Try to search again !' );
} );
Route::get('/schedule/{id}','UserController@schedule');
Route::get('/booking/{id}','UserController@booking')->middleware('auth');
Route::post('/bookingsum','OmiseController@bookingstore');
Route::get('/bookingsum','OmiseController@bookingsum');;
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
Route::get('/profileuser','UserController@profileuser')->middleware('auth');


Route::get('/usererror', function () {
	return view ('usererror');
});

