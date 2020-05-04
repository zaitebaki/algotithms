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

Route::get('/', 'Start\IndexController@index')->name('startPage');

Route::get('/admin-ft17', 'Admin\IndexController@index')->name('adminPage');
Route::post('/add-group', 'Admin\IndexController@addGroup')->name('addGroup');
Route::post('/add-algorithm', 'Admin\IndexController@addAlgorithm')->name('addAlgorithm');
