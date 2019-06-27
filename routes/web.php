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
// Route::get('/test/{id}', function () {
//     return view('welcome');
// });

Route::get('/bookHotel/{id}', 'HotelBookController@index');  //book buttun for hotel
Route::get('/bookFlight/{id}', 'FlightBookController@index'); //book button for flight

Route::get('/', function () {
    return view('frontEnd.master'); //route for home page
})->name('triphome');

Route::get('/flightContent', function () {
    return view('frontEnd.flightContent');
})->name('flight');

Route::get('/hotelContent', function () {
    return view('frontEnd.hotelContent');
})->name('hotel');

Route::get('/cab', function () {
     return view('frontEnd.cabContent');
})->name('cab');

Route::get('/maverick', function () {
    return view('frontEnd.maverick');
})->name('mv');

Route::post('/submit', 'SearchController@index' ); //route for search
Route::post('/booksubmithotel/{ida}', 'HotelBookControllerV2@index' ); //route for submit book hotel form
Route::post('/booksubmitflight/{ida}', 'FlightBookControllerV2@index' ); //route for submit book flight form

Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'SearchController@autocomplete'));// autocomple js call this routefor home page form
Route::get('autocompletehotel',array('as'=>'autocompletehotel','uses'=>'VoiceController@autocomplete'));// autocomple js call this route for fhotel voice search

Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('google');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback'); //google callback

Route::get('/voice', function()  //Voice search route
{
    return view('frontEnd.voice');
})->name('voice');
Route::post('/voicecontrollehotel','voiceController@hotel'); //take to voice controller hotel function
Route::post('/voicecontrolleflight','voiceController@flight'); //take to voice controller flight function

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs'); //For error log controller

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
