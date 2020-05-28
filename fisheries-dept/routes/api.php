<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'PassportController@login');
    Route::post('register', 'PassportController@register');
    
    Route::middleware('auth:api')->group(function () {
    Route::get('user', 'PassportController@details');
 
    Route::post('fishponds/create', 'FishpondController@store');
    Route::put('fishponds/uploadpond/{id}','FishpondController@uploadpond');
    // Edit data by user
    Route::put('fishponds/edit/{id}','FishpondController@editUserData');
    Route::get('/fishponds/pondlist','FishpondController@pondList');
    Route::post('/fishponds/search','FishpondController@search');

    Route::get('schemes','SchemeController@listOfSchemes');

    Route::get('tehsils','TehsilController@listOfTehsils');
});


Route::post('/searchPonds','FishPondController@searchPonds');
Route::post('/searchTehsil','FishPondController@searchTehsil');
Route::post('/searchPondsAizawl','FishPondController@searchPondsAizawl');

Route::post('/findPond/{id}','FishPondController@findPond');
Route::post('/findImages/{id}','FishPondController@findImages');
Route::post('/findPropic/{id}','FishPondController@findPropic');


// new 
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/schemes','SchemeController@index')->name('scheme.index');
Route::get('schemes/edit/{id}')->name('scheme.edit');
Route::get('schemes/delete/{id}')->name('scheme.delete');
Route::post('schemes/create','SchemeController@store')->name('schemes.create');


Route::get('/tehsils','TehsilController@index')->name('tehsil.index');
Route::post('/tehsils/create','TehsilController@store')->name('tehsil.create');
