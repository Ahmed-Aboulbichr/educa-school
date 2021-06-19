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
    Route::get('utilisateurs', 'UserController@renderView')->name('getView');
    Route::get('renderUsers', 'UserController@renderUsers')->name('getUsers');
    Route::get('renderUser', 'UserController@renderUser')->name('getUser');
    Route::post('storeUser', 'UserController@store')->name('addUser');
    Route::put('updateUser', 'UserController@update')->name('editUser');
    Route::delete('destroy', 'UserController@destroy')->name('deleteUser');
});


Route::get('pages-404', 'NazoxController@index');
Route::get('/', 'HomeController@root');
Route::get('{any}', 'HomeController@index');

Route::get('index/{locale}', 'LocaleController@lang');