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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test','ZkController@test');
Route::get('/index','ZkController@index');
Route::get('/zkusers', 'ZkController@users_index')->name('zkusers.index');
Route::get('/fingerprint', 'ZkController@fingerprint')->name('fingerprint');

Route::get('/zkusers/push', 'ZkController@push_all_zkusers')->name('zkusers.push');

Auth::routes();




