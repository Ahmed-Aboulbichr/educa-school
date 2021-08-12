<?php

use App\Candidat;
use GuzzleHttp\Psr7\Request;
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
    Route::get('getTypeFormations', 'TypeFormationController@renderTypeFormations')->name('getTypeFormations');
    Route::get('getNiveau', 'NiveauEtudeController@renderNiveau')->name('getNiveau');
    Route::get('getSessions', 'SessionController@renderSessions')->name('getSessions');
    Route::get('getAcademies', 'AcademieController@renderAcademies')->name('getAcademies');
    Route::get('getProvinces', 'ProvinceController@renderProvinces')->name('getProvinces');
    Route::get('getSecteurProfessions', 'SecteurProfessionController@renderSecteurs')->name('getSecteurProfessions');
    //////////////////////////

    Route::post('/stepOne', 'CandidatController@saveStepOne')->name('saveCandidatStepOne');
    Route::post('saveCandidatStepTwo', 'CandidatController@saveStepTwo')->name('saveCandidatStepTwo');
    Route::post('saveCandidatStepThree', 'CandidatController@saveStepThree')->name('saveCandidatStepThree');
    Route::post('saveCandidatStepFour/{type}', 'CandidatController@saveStepFour')->name('saveCandidatStepFour');
    Route::get('/professeur/{professeur}', 'ProfesseurController@affiche')->name('professeur');
    Route::post('/professeur', 'ProfesseurController@insert')->name('insertprofesseur');
    Route::put('/professeur/{professeur}', 'ProfesseurController@modify')->name('modifyProf');
    Route::get('/getSessionsByAnneeUniv/{date}', 'SessionController@getSessionsByAnneeUniv')->name('getSessionsByAnneeUniv');
    Route::get('/all_type_formations', 'TypeFormationController@all')->name('all_type_formations');
    Route::get('/all_sessions', 'SessionController@all')->name('all_sessions');
    /////////////////////////

    Route::get('storage/{directory}/{filename}', 'docFilesController@getFiles')->name('getFiles');

    Route::get('candidature/{id}', 'CandidatureController@editValidation')->name('candidatures.editValidation');

    Route::resource('/niveau_etudes', 'NiveauEtudeController');
    Route::resource('/cursus_universitaire', 'CursusUniversitaireController');
    Route::resource('/administrateurs', 'AdministrateurController');
    Route::resource('/professeurs', 'ProfesseurController');
    Route::resource('/etudiants', 'EtudiantController');
    Route::resource('/candidats', 'CandidatController');

    //E-document
    Route::get('/edocument/archive', 'EdocumentGestionController@archive')->name('archive');
    Route::get('/edocument/parametre', 'EdocumentGestionController@parametre');
    Route::resource('/edocument', 'EdocumentGestionController');

    Route::get('/profile', 'CandidatController@profile')->name('profile');
    Route::get('mesCandidatures', 'CandidatureController@renderMyCandidatures')->name('mesCandidatures');

    Route::post('saveCandidature', 'CandidatureController@store')->name('saveCandidature');
    Route::resource('candidatures', 'CandidatureController', [
        'except' => ['index']
    ]);

    Route::get('candidature/{type}', 'CandidatureController@index')->name('candidatures.index');

    // Route::get('candidatureValide/{id}', 'CandidatureController@Valide')->name('candidature.valide');
    Route::resource('/session', 'SessionController',  [
        'except' => ['update']
    ]);
    Route::resource('/formation', 'FormationController', [
        'except' => ['update']
    ]);
    Route::resource('/type_formations', 'TypeFormationController', [
        'except' => ['update']
    ]);
    Route::resource('/semestre', 'SemestreController');
    Route::resource('/module', 'ModuleController');

    //

    Route::get('/SemestresByFormation', 'SemestreController@getSemestresByFormation')->name('getSemestresByFormation');
    Route::get('/FormationsBySession', 'FormationController@getFormationsBySession')->name('getFormationsBySession');
    Route::get('/semestreConfig', function(){
        return view('admin.structure_formation.semestre.config');
    });
    Route::get('/moduleConfig', function(){
        return view('admin.structure_formation.module.config');
    });

    Route::post('/formation/update/{id}', 'FormationController@update')->name('formation.update');
    Route::post('/type_formations/update/{id}', 'TypeFormationController@update')->name('type_formations.update');
    Route::post('/session/update/{id}', 'SessionController@update')->name('session.update');
    Route::resource('/seances', 'SeanceController');
    Route::resource('/salles', 'SalleController');

    //Route::post('postuleCandidature/{id}','CandidatureController@postule')->name('postuleCandidature');

    //////////// PDF ////////////
    Route::get('candidature/showPDF/{id}', 'CandidatureController@showPDF')->name('showPDF');
    Route::get('candidature/downloadPDF/{id}', 'CandidatureController@downloadPDF')->name('downloadPDF');

    //Route::post('/setValidate', 'CandidatureController@setValidate')->name('setValidate');

    Route::get('calendar', 'emploiDuTempsController@index');
    Route::get('custom_semestres', 'SemestreController@show_multi')->name('custom_semestres');
     Route::get('custom_groupes', 'GroupeController@show_multi')->name('custom_groupes');
    Route::get('custom_sousgroupes', 'sousGroupeController@show_multi')->name('custom_sousgroupes');

    Route::any('calendar/action','emploiDuTempsController@action');

    Route::get('pages-404', 'NazoxController@index');
    Route::any('/', 'HomeController@root');
    Route::get('{any}', 'HomeController@index');
    Route::get('{any}', 'HomeController@index');
    Route::get('{any}', 'HomeController@index');
});
