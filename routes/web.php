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
Route::get('/add-group', 'Admin\GroupController@index')->name('groupPageIndex');
Route::get('/add-language', 'Admin\LanguageController@index')->name('languagePageIndex');

Route::post('/add-group-post', 'Admin\GroupController@addGroup')->name('addGroup');
Route::post('/add-language-post', 'Admin\LanguageController@addLanguage')->name('addLanguage');

Route::post('/add-algorithm', 'Admin\IndexController@addAlgorithm')->name('addAlgorithm');
