<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/linkstorage', function () {
    Artisan::call('storage:link'); // this will do the command line job
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('rh/create','App\Http\Controllers\Rhcontroller@create')->name('rh/create');
Route::post('rh','App\Http\Controllers\Rhcontroller@store');
Route::get('/ile/download/{id}','App\Http\Controllers\Rhcontroller@show')->name('downloadfile');
Route::delete( 'rh/{id}','App\Http\Controllers\Rhcontroller@destroy');
Route::get('rh/{id}','App\Http\Controllers\Rhcontroller@showdetail')->name('detailrh');



Route::get('/appointments', 'App\Http\Controllers\AppointmentController@index');
Route::get('/appointments/filter', 'App\Http\Controllers\AppointmentController@filter');
Route::post('/appointments/new', 'App\Http\Controllers\AppointmentController@store');
Route::patch('/appointments/{appointment}/edit', 'App\Http\Controllers\AppointmentController@update');
Route::delete('/appointments/{appointment}', 'App\Http\Controllers\AppointmentController@destroy');


Route::get('/fullcalender', 'App\Http\Controllers\FullCalenderController@index');
Route::get('fullcalender/create','App\Http\Controllers\FullCalenderController@create');
Route::post('fullcalender','App\Http\Controllers\FullCalenderController@store');
Route::delete( 'fullcalender/{id}','App\Http\Controllers\FullCalenderController@destroy');
Route::get('fullcalender/{id}/edit','App\Http\Controllers\FullCalenderController@edit');
Route::put( 'fullcalender/{id}','App\Http\Controllers\FullCalenderController@update');
Route::get('fullcalender/{id}','App\Http\Controllers\FullCalenderController@detail');






Route::get('bibu/create','App\Http\Controllers\BibliothequeuController@create')->name('bibu/create')->middleware('can:adminp');
Route::post('bibu','App\Http\Controllers\BibliothequeuController@store');
Route::get('/file/download/{id}','App\Http\Controllers\BibliothequeuController@show')->name('downloadfileu');
Route::delete( 'bibu/{id}','App\Http\Controllers\BibliothequeuController@destroy');

Route::get('annonce/create','App\Http\Controllers\AnnonceController@create')->name('annonce/create');
Route::post('annonce','App\Http\Controllers\AnnonceController@store');
// Route::get('/file/download/{id}','App\Http\Controllers\BibliothequeuController@show')->name('downloadfileu');
Route::delete( 'annonce/{id}','App\Http\Controllers\AnnonceController@destroy');
Route::get('annonce/{id}/edit','App\Http\Controllers\AnnonceController@edit');
Route::put( 'annonce/{id}','App\Http\Controllers\AnnonceController@update');
Route::get('/annonce/{id}/pdf','App\Http\Controllers\AnnonceController@createPDF');
Route::get('annonce/{id}','App\Http\Controllers\AnnonceController@show')->name('detail');

Route::get('actualite/create','App\Http\Controllers\ActualiteController@create')->name('actualite/create');
Route::post('actualite','App\Http\Controllers\ActualiteController@store');
Route::delete( 'actualite/{id}','App\Http\Controllers\ActualiteController@destroy');
Route::get('actualite/{id}/edit','App\Http\Controllers\ActualiteController@edit');
Route::put( 'actualite/{id}','App\Http\Controllers\ActualiteController@update');
Route::get('actualite/{id}','App\Http\Controllers\ActualiteController@show')->name('detailact');


Route::resource('commission','App\Http\Controllers\CommissionController');

Route::resource('lois', 'App\Http\Controllers\LoisController');



Route::get('/url', function (){ return asset('public/black/'); });




Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('rh', ['as' => 'rh.index', 'uses' => 'App\Http\Controllers\Rhcontroller@index']);
		// Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('bibu', ['as' => 'bibu.index', 'uses' => 'App\Http\Controllers\BibliothequeuController@index']);
		Route::get('annonce', ['as' => 'annonce.index', 'uses' => 'App\Http\Controllers\AnnonceController@index']);
        Route::get('lois', ['as' => 'lois.index', 'uses' => 'App\Http\Controllers\LoisController@index']);
		Route::get('actualite', ['as' => 'actualite.index', 'uses' => 'App\Http\Controllers\ActualiteController@index']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::get('user/{id}','App\Http\Controllers\UserController@show')->name('detailu');
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});



