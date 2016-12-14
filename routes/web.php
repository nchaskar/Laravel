<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::resource('/','HomeController@index');

Route::get('/home','HomeController@index');

Route::get('home/show/{id}','HomeController@show');

Route::match(array('GET', 'POST'),'home/update/{id}','HomeController@update');

Route::get('home/logout','HomeController@logout');

Route::get('home/delete/{id}','HomeController@delete');



Route::resource('my','MyController');

Route::resource('admin','AdminController');


Route::post('admin/create','AdminController@create');

Route::post('admin/store','AdminController@store');



//Route::get('/show', 'HomeController@show');


//Route::get('/home.show', 'HomeController@show');
/*
Route::patch('/show/{id}',[
    'uses' => 'HomeController@show'
]);
*/
