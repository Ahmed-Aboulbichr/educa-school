<?php

use App\Candidat;
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



Auth::routes(['verify' => true]);

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::group(['middleware' => 'auth'], function () {
    Route::get('pre-ins', 'CandidatController@index')->name('getPreInscr');
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
    Route::post('saveCandidatStepTwo', 'CandidatController@saveStepTwo')->name('saveCandidatStepTwo');
    Route::post('saveCandidatStepThree', 'CandidatController@saveStepThree')->name('saveCandidatStepThree');
    Route::post('saveCandidatStepFour', 'CandidatController@saveStepFour')->name('saveCandidatStepFour');


    /////////////////////////

    Route::get('storage/{directory}/{filename}', 'docFilesController@getFiles')->name('getFiles');

    //other routes
    Route::resource('/type_formations', 'TypeFormationController')->only(['index', 'show']);

    Route::resource('/cursus_universitaire', 'CursusUniversitaireController');
    Route::resource('/administrateurs', 'AdministrateurController');
    Route::resource('/professeurs', 'ProfesseurController');
    Route::resource('/etudiants', 'EtudiantController');
    Route::resource('/candidats', 'CandidatController');
    Route::get('/profile','CandidatController@profile' )->name('profile');
    Route::post('saveCandidature', 'CandidatureController@store')->name('saveCandidature');
    Route::resource('candidatures', 'CandidatureController')->only(['index', 'destroy', 'edit', 'show']);
    Route::get('candidature/{id}', 'CandidatureController@editValidation')->name('candidatures.editValidation');
    // Route::get('candidatureValide/{id}', 'CandidatureController@Valide')->name('candidature.valide');
    Route::resource('/sessions', 'SessionController');
    Route::resource('/formations', 'FormationController');
    Route::resource('/seances', 'SeanceController');
    Route::resource('/salles', 'SalleController');

    Route::post('postuleCandidature/{id}','CandidatureController@postule')->name('postuleCandidature');




    //////////// PDF ////////////
    Route::get('candidature/showPDF/{id}', 'CandidatureController@showPDF')->name('showPDF');
    Route::get('candidature/downloadPDF/{id}', 'CandidatureController@downloadPDF')->name('downloadPDF');


    //Route::post('/setValidate', 'CandidatureController@setValidate')->name('setValidate');


    Route::get('pages-404', 'NazoxController@index');
    Route::get('/', 'HomeController@root');
    Route::get('{any}', 'HomeController@index');
    Route::get('{any}', 'HomeController@index');
});
