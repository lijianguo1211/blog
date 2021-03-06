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

//Route::group([
//    'middleware' => 'api',
//    'prefix' => 'auth'
//], function ($router) {
//    Route::post('login', 'AuthController@login');
//    Route::post('logout', 'AuthController@logout');
//    Route::post('refresh', 'AuthController@refresh');
//    Route::post('me', 'AuthController@me');
//});

Route::prefix('auth')->name('auth.')->middleware('api')
    ->group(function ($router) {
        $router->post('login', 'AuthController@login');
});



Route::namespace('Home')->middleware('csrf')
    ->as('home.')->group(function ($group) {
    Route::namespace('Qrcode')->prefix('qrcode')->as('gyz.')
        ->group(function ($group) {
        $group->get('/', 'GongYongZhengController@index')->name('index');
        $group->get('ajaxTest', 'AjaxQrcodeController@textQrcode')->name('ajaxTest');
    });

    $group->get('/', 'IndexController@index')->name('index');
    $group->get('blog', 'BlogController@index')->name('blog');
    $group->get('blog/{id}', 'BlogDetailController@index')->name('blog_details');
    $group->get('blog/add/{id}', 'AjaxController@addLikes')->name('addLikes');
    $group->get('blog/remove/{id}', 'AjaxController@removeLikes')->name('removeLikes');
    $group->post('blog/comment/{id}', 'AjaxController@comment')->name('comment');
    $group->get('diary', 'DiaryController@index')->name('diary');
    $group->get('source', 'SourceController@index')->name('source');
    $group->get('blog-list/{page}', 'AjaxBlogController@index')->name('blog-list');
    $group->get('home-list/{page}', 'AjaxHomeController@index')->name('home-list');
});

//Route::namespace('Admin')->as('admin.')->group(function ($group) {
//    $group->get('admin', 'AdminController@index');
//});


