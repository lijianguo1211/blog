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

Route::namespace('Home')->as('home.')->group(function ($group) {
    $group->get('/', 'IndexController@index')->name('index');
    $group->get('blog', 'BlogController@index')->name('blog');
    $group->get('blog/{id}', 'BlogDetailController@index')->name('blog_details');
    $group->get('blog/add/{id}', 'AjaxController@addLikes')->name('addLikes');
    $group->get('blog/remove/{id}', 'AjaxController@removeLikes')->name('removeLikes');
    $group->post('blog/comment/{id}', 'AjaxController@comment')->name('comment');
    $group->get('diary', 'DiaryController@index')->name('diary');
});


