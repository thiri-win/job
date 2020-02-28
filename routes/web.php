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
/*
Jobs
*/
Route::get('/', 'JobController@index')->name('job.index');
Route::get('/jobs/{id}/{slug}', 'JobController@show')->name('job.show');

// Company
Route::get('/company/{id}/{name}', 'CompanyController@show')->name('company.show');

// User
Route::get('user/', 'UserController@index')->name('user.index');
Route::get('user/{user}', 'UserController@show')->name('user.show');
Route::get('user/{user}/edit', 'UserController@edit')->name('user.edit');
Route::put('user/{user}/update', 'UserController@update')->name('user.update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
