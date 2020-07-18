<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('tags', TagsController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('news', NewsController::class);
    $router->prefix('post')->as('post.')->group(function ($router) {
        $router->get('/', 'PostController@index')->name('index');
        $router->get('create', 'PostController@create')->name('create');
        $router->get('{id}/edit', 'PostController@edit')->name('edit');
        $router->post('store', 'PostController@store')->name('store');
        $router->post('update/{id}', 'PostController@update')->name('update');
        $router->delete('delete', 'PostController@delete')->name('delete');
    });

});
