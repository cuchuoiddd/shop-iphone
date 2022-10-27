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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('test', function () {
        return view('test')->with(['type' => 'alert-success', 'message' => 'Thêm mới thành công']);
    });
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
    Route::get('report', 'Report\ReportController@index')->name('report');

    Route::group(['namespace' => 'Admins', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('settings', 'SettingController');
        Route::resource('categories', 'CategoryController');
        Route::resource('products', 'ProductController');
        Route::put('update-status-product', 'ProductController@updateStatus');
        Route::get('get-info-product/{product_id}', 'ProductController@getInfoProduct');

        Route::resource('banners', 'BannerController');
        Route::resource('capacities', 'CapacityController');
        Route::resource('colors', 'ColorController');

        Route::get('change-password','SettingController@changePassword');
        Route::put('update-password','SettingController@updatePassword');
    });



});
