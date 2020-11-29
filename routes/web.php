<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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
use Illuminate\Support\Facades\Cache;

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Cache::flush();

    return "Кэш очищен.";
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', 'IndexController@show');
Route::get('/{slug}', 'IndexController@subIndex');

Route::get('/api/get/{city}', 'UploadController@get');



