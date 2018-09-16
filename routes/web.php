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

Route::get('/','PagesController@Index');
Route::get('/home','PagesController@Index');
Route::get('/login','PagesController@login');

Route::group(['middleware' => ['admin']], function () {
   
    Route::get('/admin/panel','PagesController@adminpanel')->name('panel');
 
    Route::resource('/admin/posts','PostController');
    Route::get('/admin/posts','PagesController@posts')->name('posts');
    
    Route::resource('/admin/users','UsersController');
    Route::get('/admin/users','PagesController@users')->name('users');

});
Auth::routes();

