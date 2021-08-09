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




Route::get('rh/create','App\Http\Controllers\Rhcontroller@create')->name('rh/create')->middleware('auth')->middleware('can:edit');
Route::post('rh','App\Http\Controllers\Rhcontroller@store')->middleware('auth');
Route::get('/ile/download/{id}','App\Http\Controllers\Rhcontroller@show')->name('downloadfile')->middleware('auth');
Route::delete( 'rh/{id}','App\Http\Controllers\Rhcontroller@destroy')->middleware('auth')->middleware('can:edit');
Route::get('rh/{id}','App\Http\Controllers\Rhcontroller@showdetail')->name('detailrh')->middleware('auth');

Route::get('contact','App\Http\Controllers\Contactcontroller@create')->middleware('auth');
Route::post('contact','App\Http\Controllers\Contactcontroller@store')->middleware('auth');



Route::get('/fullcalender', 'App\Http\Controllers\FullCalenderController@index')->middleware('auth');
Route::get('fullcalender/create','App\Http\Controllers\FullCalenderController@create')->middleware('auth')->middleware('can:edit');
Route::post('fullcalender','App\Http\Controllers\FullCalenderController@store')->middleware('auth');
Route::post('loiscalendar','App\Http\Controllers\FullCalenderController@lois')->middleware('auth');
Route::delete( 'fullcalender/{id}','App\Http\Controllers\FullCalenderController@destroy')->middleware('can:edit');
Route::get('fullcalender/{id}/edit','App\Http\Controllers\FullCalenderController@edit')->middleware('can:edit');
Route::put( 'fullcalender/{id}','App\Http\Controllers\FullCalenderController@update')->middleware('auth');
Route::get('fullcalender/{id}','App\Http\Controllers\FullCalenderController@detail')->middleware('auth');


Route::get('/fonc', 'App\Http\Controllers\UserController@index1')->middleware('auth');
Route::get('/alluser', 'App\Http\Controllers\UserController@index2')->middleware('can:edit');

Route::get('/TestEtAstuce', 'App\Http\Controllers\TeAstuceController@index')->middleware('auth');
Route::get('TestEtAstuce/create','App\Http\Controllers\TeAstuceController@create')->name('TestEtAstuce/create')->middleware('auth')->middleware('can:edit');
Route::post('TestEtAstuce','App\Http\Controllers\TeAstuceController@store')->middleware('auth');
Route::delete( 'TestEtAstuce/{id}','App\Http\Controllers\TeAstuceController@destroy')->middleware('auth')->middleware('can:edit');
Route::get( 'TestEtAstuce/{id}','App\Http\Controllers\TeAstuceController@show')->middleware('auth');
Route::get('TestEtAstuce/{id}/edit','App\Http\Controllers\TeAstuceController@edit')->middleware('can:edit');
Route::put( 'TestEtAstuce/{id}','App\Http\Controllers\TeAstuceController@update')->middleware('auth');



Route::get('bibu/create','App\Http\Controllers\BibliothequeuController@create')->name('bibu/create')->middleware('can:edit');
Route::post('bibu','App\Http\Controllers\BibliothequeuController@store')->middleware('auth');
Route::delete( 'bibu/{id}','App\Http\Controllers\BibliothequeuController@destroy')->middleware('can:edit');


Route::get('documents', ['as' => 'documents.index', 'uses' => 'App\Http\Controllers\DocumentController@index'])->middleware('auth');
Route::get('documents/create','App\Http\Controllers\DocumentController@create')->name('documents/create')->middleware('can:edit');
Route::post('documents','App\Http\Controllers\DocumentController@store')->middleware('auth');
Route::delete( 'documents/{id}','App\Http\Controllers\DocumentController@destroy')->middleware('can:edit');
Route::get('/document/download/{id}','App\Http\Controllers\DocumentController@show')->name('downloaddoc');


Route::get('annonce/create','App\Http\Controllers\AnnonceController@create')->name('annonce/create')->middleware('can:edit');
Route::post('annonce','App\Http\Controllers\AnnonceController@store')->middleware('auth');
Route::get('/file/download/{id}','App\Http\Controllers\BibliothequeuController@show')->name('downloadfileu');
Route::delete( 'annonce/{id}','App\Http\Controllers\AnnonceController@destroy')->middleware('can:edit');
Route::get('annonce/{id}/edit','App\Http\Controllers\AnnonceController@edit')->middleware('can:edit');
Route::put( 'annonce/{id}','App\Http\Controllers\AnnonceController@update');
Route::get('/annonce/{id}/pdf','App\Http\Controllers\AnnonceController@createPDF');
Route::get('annonce/{id}','App\Http\Controllers\AnnonceController@show')->name('detail');

Route::get('actualite/create','App\Http\Controllers\ActualiteController@create')->name('actualite/create')->middleware('can:edit');
Route::post('actualite','App\Http\Controllers\ActualiteController@store');
Route::delete( 'actualite/{id}','App\Http\Controllers\ActualiteController@destroy')->middleware('can:edit');
Route::get('actualite/{id}/edit','App\Http\Controllers\ActualiteController@edit')->middleware('can:edit');
Route::put( 'actualite/{id}','App\Http\Controllers\ActualiteController@update');
Route::post( 'comment/{id}','App\Http\Controllers\ActualiteController@comment');
Route::get('actualite/{id}','App\Http\Controllers\ActualiteController@show')->name('detailact');

Route::get('travaux/create','App\Http\Controllers\TraveauController@create')->name('travaux/create')->middleware('can:edit');
Route::post('travaux','App\Http\Controllers\TraveauController@store');
Route::delete( 'travaux/{id}','App\Http\Controllers\TraveauController@destroy')->middleware('can:edit');
Route::get('travaux/{id}/edit','App\Http\Controllers\TraveauController@edit')->middleware('can:edit');
Route::put( 'travaux/{id}','App\Http\Controllers\TraveauController@update');
Route::get('travaux/{id}','App\Http\Controllers\TraveauController@show')->name('detailtra');
//Route::get('minical','App\Http\Controllers\HomeController@cal')->name('minical');
//Route::get('minical2','App\Http\Controllers\HomeController@cal2')->name('minical2');

Route::get('/Image', 'App\Http\Controllers\GImageController@index')->middleware('auth');
Route::get('Image/create','App\Http\Controllers\GImageController@create')->name('Image/create')->middleware('can:edit');
Route::post('Image','App\Http\Controllers\GImageController@store');
Route::delete( 'Image/{id}','App\Http\Controllers\GImageController@destroy')->middleware('can:edit');
Route::get('Image/{id}/edit','App\Http\Controllers\GImageController@edit')->middleware('can:edit');
Route::put( 'Image/{id}','App\Http\Controllers\GImageController@update');

Route::get('/Video', 'App\Http\Controllers\VideotequeController@index')->middleware('auth');
Route::get('Video/create','App\Http\Controllers\VideotequeController@create')->name('Video/create')->middleware('can:edit');
Route::post('Video','App\Http\Controllers\VideotequeController@store');
Route::delete( 'Video/{id}','App\Http\Controllers\VideotequeController@destroy')->middleware('can:edit');
Route::get('Video/{id}/edit','App\Http\Controllers\VideotequeController@edit')->middleware('can:edit');
Route::put( 'Video/{id}','App\Http\Controllers\VideotequeController@update');

Route::get('/InterVideo', 'App\Http\Controllers\InterVideoController@index')->middleware('auth');
Route::get('InterVideo/create','App\Http\Controllers\InterVideoController@create')->name('InterVideo/create')->middleware('can:edit');
Route::post('InterVideo','App\Http\Controllers\InterVideoController@store');
Route::delete( 'InterVideo/{id}','App\Http\Controllers\InterVideoController@destroy')->middleware('can:edit');
Route::get('InterVideo/{id}/edit','App\Http\Controllers\InterVideoController@edit')->middleware('can:edit');
Route::put( 'InterVideo/{id}','App\Http\Controllers\InterVideoController@update');

Route::get('/G_Parlementaire', 'App\Http\Controllers\GParlementaireController@index')->middleware('auth')->middleware('can:depute');
Route::get('G_Parlementaire/create','App\Http\Controllers\GParlementaireController@create')->name('G_Parlementaire/create')->middleware('can:edit');
Route::post('G_Parlementaire','App\Http\Controllers\GParlementaireController@store');
Route::delete( 'G_Parlementaire/{id}','App\Http\Controllers\GParlementaireController@destroy')->middleware('can:edit');
Route::get('G_Parlementaire/{id}/edit','App\Http\Controllers\GParlementaireController@edit')->middleware('can:edit');
Route::put( 'G_Parlementaire/{id}','App\Http\Controllers\GParlementaireController@update');
Route::get('G_Parlementaire/{id}','App\Http\Controllers\GParlementaireController@show')->middleware('auth')->middleware('can:depute');


Route::resource('commission','App\Http\Controllers\CommissionController')->middleware('can:depute')->middleware('can:edit');
Route::resource('department','App\Http\Controllers\DepartmentController')->middleware('auth')->middleware('can:edit')->middleware('can:fonctionnaire');
Route::post('service','App\Http\Controllers\ServiceController@store')->middleware('can:edit');
Route::post('partage','App\Http\Controllers\PartageController@store');
Route::get('/partage/download/{id}','App\Http\Controllers\PartageController@show')->name('downloadPartage');



Route::get('loisT', ['as' => 'loist.index', 'uses' => 'App\Http\Controllers\LoisController@index1'])->middleware('auth')->middleware('can:edit')->middleware('can:depute');
Route::resource('lois', 'App\Http\Controllers\LoisController')->middleware('auth')->middleware('can:edit')->middleware('can:depute');
Route::get('loisdetails/{id}','App\Http\Controllers\LoisController@detail');
Route::get('lois/create','App\Http\Controllers\LoisController@create1');
Route::post('enonce','App\Http\Controllers\LoisController@updateEnonce')->name('enonce');
Route::get('/file/download/{id}','App\Http\Controllers\LoisController@download')->name('downloadfileE');
Route::delete('enonce/{id}','App\Http\Controllers\LoisController@deleteE')->name('deleteE')->middleware('can:edit');


Route::get('/fileP/download/{id}','App\Http\Controllers\LoisController@downloadP')->name('downloadfileP');
Route::delete('pre/{id}','App\Http\Controllers\LoisController@deleteP')->name('deleteP')->middleware('can:edit');
Route::post('pre','App\Http\Controllers\LoisController@updatePre')->name('pre')->middleware('can:edit');
Route::get('/filePA/download/{id}','App\Http\Controllers\LoisController@downloadP')->name('downloadfilePA');
Route::delete('prea/{id}','App\Http\Controllers\LoisController@deletePA')->name('deletePA')->middleware('can:edit');
Route::post('prea','App\Http\Controllers\LoisController@updatePreAR')->name('prea')->middleware('can:edit');

Route::get('/fileEA/download/{id}','App\Http\Controllers\LoisController@downloadE')->name('downloadfileEA');
Route::delete('enonceA/{id}','App\Http\Controllers\LoisController@deleteEA')->name('deleteEA')->middleware('can:edit');
Route::post('enonceAR','App\Http\Controllers\LoisController@updateEnonceAR')->name('enonceAR')->middleware('can:edit');


Route::get('/fileS/download/{id}','App\Http\Controllers\LoisController@downloadS')->name('downloadfileS');
Route::delete('seance/{id}','App\Http\Controllers\LoisController@deleteS')->name('deleteS')->middleware('can:edit');
Route::post('seance','App\Http\Controllers\LoisController@updateSean')->name('sean')->middleware('can:edit');
Route::get('/fileSAR/download/{id}','App\Http\Controllers\LoisController@downloadSA')->name('downloadfileSA');
Route::delete('seanceAR/{id}','App\Http\Controllers\LoisController@deleteSA')->name('deleteSA')->middleware('can:edit');
Route::post('seanceAR','App\Http\Controllers\LoisController@updateSeanAR')->name('seanAR')->middleware('can:edit');


Route::get('/fileP/download/{id}','App\Http\Controllers\LoisController@downloadP')->name('downloadfileP');
Route::delete('planning/{id}','App\Http\Controllers\LoisController@deleteP')->name('deletePl')->middleware('can:edit');
Route::post('planning','App\Http\Controllers\LoisController@updatePla')->name('planning')->middleware('can:edit');



Route::get('/fileC/download/{id}','App\Http\Controllers\LoisController@downloadC')->name('downloadfileC');
Route::delete('comp/{id}','App\Http\Controllers\LoisController@deleteC')->name('deleteC')->middleware('can:edit');
Route::post('comp','App\Http\Controllers\LoisController@updateComp')->name('comp')->middleware('can:edit');
Route::get('/fileCAR/download/{id}','App\Http\Controllers\LoisController@downloadCA')->name('downloadfileCA');
Route::delete('compAR/{id}','App\Http\Controllers\LoisController@deleteCA')->name('deleteCA')->middleware('can:edit');
Route::post('compAR','App\Http\Controllers\LoisController@updateCompAR')->name('compAR')->middleware('can:edit');

Route::get('/fileI/download/{id}','App\Http\Controllers\LoisController@downloadI')->name('downloadfileI');
Route::delete('inter/{id}','App\Http\Controllers\LoisController@deleteI')->name('deleteI');
Route::post('inter','App\Http\Controllers\LoisController@updateInter')->name('inter');
Route::get('/fileIAR/download/{id}','App\Http\Controllers\LoisController@downloadIA')->name('downloadfileIA');
Route::delete('interAR/{id}','App\Http\Controllers\LoisController@deleteIA')->name('deleteIA');
Route::post('interAR','App\Http\Controllers\LoisController@updateInterAR')->name('interAR');

Route::get('/fileN/download/{id}','App\Http\Controllers\LoisController@downloadN')->name('downloadfileN');
Route::delete('nouv/{id}','App\Http\Controllers\LoisController@deleteN')->name('deleteN')->middleware('can:edit');
Route::post('nouv','App\Http\Controllers\LoisController@updateN')->name('nouv')->middleware('can:edit');
Route::get('/fileNAR/download/{id}','App\Http\Controllers\LoisController@downloadNA')->name('downloadfileNA');
Route::delete('nouvAR/{id}','App\Http\Controllers\LoisController@deleteNA')->name('deleteNA')->middleware('can:edit');
Route::post('nouvAR','App\Http\Controllers\LoisController@updateNAR')->name('nouvAR')->middleware('can:edit');

Route::delete('loisdelete/{id}','App\Http\Controllers\LoisController@destroy')->name('loisdelete');


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
        Route::get('lois', ['as' => 'lois.index', 'uses' => 'App\Http\Controllers\LoisController@index'])->middleware('can:edit')->middleware('can:depute');
		Route::get('actualite', ['as' => 'actualite.index', 'uses' => 'App\Http\Controllers\ActualiteController@index']);
		Route::get('travaux', ['as' => 'travaux.index', 'uses' => 'App\Http\Controllers\TraveauController@index']);
});
Route::get('/searchd','App\Http\Controllers\UserController@search')->name('users.searchd')->middleware('auth');
Route::get('/searchf','App\Http\Controllers\UserController@searchf')->name('users.searchf')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::get('user/{id}','App\Http\Controllers\UserController@show')->name('detailu');
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});


