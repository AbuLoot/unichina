<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('lang/{locale}', function ($locale) {

	if (Session::has('locale'))
	{
		$locale = Session::get('locale');

		App::setLocale($locale);
	}
	else
	{
		$locale = Session::put('locale', 'ru');

		App::setLocale($locale);
	}

    // return redirect()->back();
});



Route::get('/', 'PagesController@index');
Route::get('index', 'PagesController@index');
/*Route::get('about', 'PagesController@about');
Route::get('universities', 'PagesController@universities');
Route::get('/', 'PagesController@index');
Route::get('/', 'PagesController@index');*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::group(['prefix' => 'admin', 'middleware' => 'web'], function () {
	Route::resource('landing', 'AdminLandingController');
	Route::resource('pages', 'AdminPagesController');
	Route::resource('universities', 'AdminUniversitiesController');
});
