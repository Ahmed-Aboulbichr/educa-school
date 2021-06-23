<?php

use Illuminate\Support\Facades\Auth;
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
    Route::get('pre-ins','CandidatureController@index')->name('getPreInscr');

    //users
    Route::get('utilisateurs', 'UserController@renderView')->name('getView');
    Route::get('renderUsers', 'UserController@renderUsers')->name('getUsers');
    Route::get('renderUser', 'UserController@renderUser')->name('getUser');
    Route::post('storeUser', 'UserController@store')->name('addUser');
    Route::put('updateUser', 'UserController@update')->name('editUser');
    Route::delete('destroy', 'UserController@destroy')->name('deleteUser');
    //////////////////////////////
    Route::get('getPays', 'PaysController@renderPays')->name('getPays');
    Route::get('getVilles', 'VillesController@renderVilles')->name('getVilles');
    Route::get('getNationalite', 'NationaliteController@renderNationalite')->name('getNationality');
    Route::get('getDelegations', 'DelegationController@renderDelegations')->name('getDelegations');
    Route::get('getFormations', 'FormationController@renderFormations')->name('getFormations');
    Route::get('getAcademies', 'AcademieController@renderAcademies')->name('getAcademies');
    Route::get('getProvinces', 'ProvinceController@renderProvinces')->name('getProvinces');
    Route::get('getSecteurProfessions', 'SecteurProfessionController@renderSecteurs')->name('getSecteurProfessions');
    //////////////////////////

    Route::post('/stepOne', 'CandidatController@saveStepOne')->name('saveCandidatStepOne');
    Route::post('saveCandidatStepTwo','CandidatController@saveStepTwo')->name('saveCandidatStepTwo');
    Route::post('saveCandidatStepThree', 'CandidatController@saveStepThree')->name('saveCandidatStepThree');
    Route::post('saveCandidatStepFour', 'CandidatController@saveStepFour')->name('saveCandidatStepFour');
    Route::post('saveCandidatStepFive', 'CandidatController@saveStepFive')->name('saveCandidatStepFive');

    /////////////////////////


});


Route::get('pages-404', 'NazoxController@index');
Route::get('/', 'HomeController@root');
Route::get('{any}', 'HomeController@index');
Route::get('{any}', 'HomeController@index');


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
