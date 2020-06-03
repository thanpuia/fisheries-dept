<?php

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

Route::get('/', function () {
    //$districts=Location::pluck('district','district');
    // return view('map.map',compact('districts'));
    return view('welcome');
});

Route::get('/map/all', function () {
    //$districts=Location::pluck('district','district');
    // return view('map.map',compact('districts'));
    return view('map.map');
});

Route::get('/map/aizawl',function(){
    return view('map.aizawl');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/schemes','SchemeController@index')->name('scheme.index');
Route::get('schemes/edit/{id}')->name('scheme.edit');
Route::get('schemes/delete/{id}')->name('scheme.delete');
Route::post('schemes/create','SchemeController@store')->name('schemes.create');


Route::get('/tehsils','TehsilController@index')->name('tehsil.index');
Route::post('/tehsils/create','TehsilController@store')->name('tehsil.create');

Route::get('farmer_list','HomeController@farmerList')->name('farmerList');
Route::get('farmer_list/{id}','HomeController@findFarmer')->name('findFarmer');
// approve section
Route::get('applications','HomeController@applicationlist')->name('applications');
Route::post('applications/approve/{id}','HomeController@approve')->name('approve');
Route::get('applications/find/{id}',"HomeController@viewDetails")->name('viewDetails');
