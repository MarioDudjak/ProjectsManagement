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

Auth::routes();


Route::get('/','ProjectController@details');

Route::get('/home', function () {
    return view('home');
});

Route::post('/projects/createproject', 'ProjectController@createproject');

Route::get('/projects/create', 'ProjectController@createform');

Route::get('/details', 'ProjectController@details');

Route::get('/project/{id}/edit', 'ProjectController@edit');

Route::get('/project/foreign/{id}/edit', 'ProjectController@editforeign');

Route::post('/projects/editproject','ProjectController@updateproject');

Route::post('/projects/editforeignproject','ProjectController@updateforeignproject');



