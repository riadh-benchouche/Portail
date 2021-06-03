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

Route::get('loisT', ['as' => 'loist.index', 'uses' => 'App\Http\Controllers\LoisController@index1']);
Route::resource('lois', 'App\Http\Controllers\LoisController');
Route::get('loisdetails/{id}','App\Http\Controllers\LoisController@detail');
Route::get('lois/create','App\Http\Controllers\LoisController@create1');
Route::post('enonce','App\Http\Controllers\LoisController@updateEnonce')->name('enonce');
Route::get('/file/download/{id}','App\Http\Controllers\LoisController@download')->name('downloadfileE');
Route::delete('enonce/{id}','App\Http\Controllers\LoisController@deleteE')->name('deleteE');


Route::get('/fileP/download/{id}','App\Http\Controllers\LoisController@downloadP')->name('downloadfileP');
Route::delete('pre/{id}','App\Http\Controllers\LoisController@deleteP')->name('deleteP');
Route::post('pre','App\Http\Controllers\LoisController@updatePre')->name('pre');
Route::get('/filePA/download/{id}','App\Http\Controllers\LoisController@downloadP')->name('downloadfilePA');
Route::delete('prea/{id}','App\Http\Controllers\LoisController@deleteP')->name('deletePA');
Route::post('prea','App\Http\Controllers\LoisController@updatePreAR')->name('prea');

Route::get('/fileEA/download/{id}','App\Http\Controllers\LoisController@downloadE')->name('downloadfileEA');
Route::delete('enonceA/{id}','App\Http\Controllers\LoisController@deleteEA')->name('deleteEA');
Route::post('enonceAR','App\Http\Controllers\LoisController@updateEnonceAR')->name('enonceAR');


Route::get('/fileS/download/{id}','App\Http\Controllers\LoisController@downloadS')->name('downloadfileS');
Route::delete('seance/{id}','App\Http\Controllers\LoisController@deleteS')->name('deleteS');
Route::post('seance','App\Http\Controllers\LoisController@updateSean')->name('sean');
Route::get('/fileSAR/download/{id}','App\Http\Controllers\LoisController@downloadSA')->name('downloadfileSA');
Route::delete('seanceAR/{id}','App\Http\Controllers\LoisController@deleteSA')->name('deleteSA');
Route::post('seanceAR','App\Http\Controllers\LoisController@updateSeanAR')->name('seanAR');


Route::get('/fileP/download/{id}','App\Http\Controllers\LoisController@downloadP')->name('downloadfileP');
Route::delete('planning/{id}','App\Http\Controllers\LoisController@deleteP')->name('deletePl');
Route::post('planning','App\Http\Controllers\LoisController@updatePla')->name('planning');



Route::get('/fileC/download/{id}','App\Http\Controllers\LoisController@downloadC')->name('downloadfileC');
Route::delete('comp/{id}','App\Http\Controllers\LoisController@deleteC')->name('deleteC');
Route::post('comp','App\Http\Controllers\LoisController@updateComp')->name('comp');
Route::get('/fileCAR/download/{id}','App\Http\Controllers\LoisController@downloadCA')->name('downloadfileCA');
Route::delete('compAR/{id}','App\Http\Controllers\LoisController@deleteCA')->name('deleteCA');
Route::post('compAR','App\Http\Controllers\LoisController@updateCompAR')->name('compAR');

Route::get('/fileI/download/{id}','App\Http\Controllers\LoisController@downloadI')->name('downloadfileI');
Route::delete('inter/{id}','App\Http\Controllers\LoisController@deleteI')->name('deleteI');
Route::post('inter','App\Http\Controllers\LoisController@updateInter')->name('inter');
Route::get('/fileIAR/download/{id}','App\Http\Controllers\LoisController@downloadIA')->name('downloadfileIA');
Route::delete('interAR/{id}','App\Http\Controllers\LoisController@deleteIA')->name('deleteIA');
Route::post('interAR','App\Http\Controllers\LoisController@updateInterAR')->name('interAR');

Route::get('/fileN/download/{id}','App\Http\Controllers\LoisController@downloadN')->name('downloadfileN');
Route::delete('nouv/{id}','App\Http\Controllers\LoisController@deleteN')->name('deleteN');
Route::post('nouv','App\Http\Controllers\LoisController@updateN')->name('nouv');
Route::get('/fileNAR/download/{id}','App\Http\Controllers\LoisController@downloadNA')->name('downloadfileNA');
Route::delete('nouvAR/{id}','App\Http\Controllers\LoisController@deleteNA')->name('deleteNA');
Route::post('nouvAR','App\Http\Controllers\LoisController@updateNAR')->name('nouvAR');

Route::post('loisv','App\Http\Controllers\LoisController@updateLois')->name('loisv');

Route::get('echarts', 'App\Http\Controllers\LoisController@echart');






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



