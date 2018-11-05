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
Route::get('/contact','PagesController@getContact');
Route::post('/contact','PagesController@postContact');
Route::get('/result','PagesController@studentResult')->middleware('auth')->name('studentresult');

Route::group(['middleware' => ['admin']], function () {

    /**** search Users ****/
    Route::get('/admin/users/search','UsersController@search')->name('users.search');
    Route::get('/admin/users/searchUser','PostController@searchUser')->name('users.searchUser');



    Route::get('/admin/panel','PagesController@adminpanel')->name('panel');
 
    Route::resource('/admin/posts','PostController');
    Route::get('/admin/posts','PagesController@posts')->name('posts');
    
    Route::resource('/admin/users','UsersController');
    Route::get('/admin/users','PagesController@users')->name('users');
    Route::get('/admin/course/create','CourseController@create')->name('courses.create');
    Route::post('/admin/course','CourseController@store')->name('courses.store');
    
    Route::get('/admin/courses','PagesController@courses')->name('courses');
    Route::get('/admin/courses/assign','PagesController@assign')->name('assign');
    Route::get('/admin/courses/assign/create','PagesController@create_assign')->name('create_assign');
    Route::post('/admin/courses/assign/create','CourseController@assign_course')->name('assign_cosurse');

    Route::get('/admin/courses/assign/edit/{user_id}','PagesController@edit_assign')->name('edit_assign');
    Route::put('/admin/courses/assign/edit/{user_id}','CourseController@edit_assign')->name('edit_assign_course');


    Route::get('/admin/courses/assign/delete/{user_id}','PagesController@delete_assign')->name('delete_assign');
    Route::delete('/admin/courses/assign/delete/{user_id}','CourseController@delete_assign')->name('delete_assign_course');

    Route::get('/admin/courses/{id}','CourseController@show')->name('course.show');;
    Route::put('/admin/courses/{id}','CourseController@update')->name('course.update');
    Route::delete('/admin/courses/{id}','CourseController@destroy')->name('course.destroy');
    
    Route::get('/admin/courses/assign/result/{user_id}','CourseController@getresult')->name('getresult');
    Route::post('/admin/courses/assign/result/{user_id}','CourseController@addresult')->name('add_result');
});
Auth::routes();

