<?php

//use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->post('admin/user/login', 'App\Api\V1\Controllers\AuthController@login')->name('api.v1.login');
    $api->get('admin/user/logout', 'App\Api\V1\Controllers\AuthController@logout')->name('api.v1.logout');
    $api->post('admin/user/info', 'App\Api\V1\Controllers\AuthController@info')->name('api.v1.info');
});
