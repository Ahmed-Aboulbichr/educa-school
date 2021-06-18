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

// Route::get('/', function () {
//     return redirect('/index');
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    //users
    Route::get('utilisateurs', 'UserController@renderView');
    Route::get('renderUsers', 'UserController@renderUsers');
});


Route::get('pages-404', 'NazoxController@index');
Route::get('/', 'HomeController@root');
Route::get('{any}', 'HomeController@index');

Route::get('index/{locale}', 'LocaleController@lang');

//other routes
Route::resource('/administrateurs', 'AdministrateurController');
Route::resource('/professeurs', 'ProfesseurController');
Route::resource('/etudiants', 'EtudiantController');
Route::resource('/candidats', 'CandidatController');
Route::resource('/candidatures', 'CandidatureController');
Route::resource('/sessions', 'SessionController');
Route::resource('/formations', 'FormationController');
Route::resource('/seances', 'SeanceController');
Route::resource('/salles', 'SalleController');
