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

Route::resource('/addtrip','addtripController');
Route::get('/addTrip', function()
{
	return View::make('/addtrip');
});
Route::post('/addtripround','addtriproundController@store');
Route::resource('/edittrip','addtripController');
Route::resource('/agency', 'showtripController'); 
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
Route::get('/booking/{id}','UserController@booking');
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