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


Route::get('/', ['uses'=>'IndexController@index', 'as'=>'home']);
Route::get('/news', ['uses'=>'NewsController@index', 'as'=>'news']);
Route::get('/news/{id}', ['uses'=>'NewsController@show', 'as'=>'news_full']);

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
    Route::get('/', ['uses'=>'Admin\IndexController@index', 'as'=>'homeAdmin']);
    Route::resource('articles', 'Admin\ArticlesController');
    Route::resource('blogs', 'Admin\BlogController');
    Route::resource('permissions', 'Admin\PermissionController', ['only'=>[
        'index',
        'store'
    ]]);

});
Auth::routes();

Route::get('/home', 'HomeController@index');
