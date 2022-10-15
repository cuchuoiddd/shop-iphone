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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('test', function () {
        $message = 'ngon ngay';
        $type = 'alert-danger';
//   return view('test',compact('message','type'));
        return view('test')->with(['type' => 'alert-danger', 'message' => 'ngon ngay']);
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
    Route::get('report', 'Report\ReportController@index')->name('report');

    Route::group(['namespace' => 'Admins', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('settings', 'SettingController');
        Route::resource('categories', 'CategoryController');
        Route::resource('products', 'ProductController');
        Route::resource('banners', 'BannerController');
    });
    Route::group(['namespace' => 'Settings', 'prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::resource('company', 'CompanyController');
        Route::resource('department', 'DepartmentController');
        Route::resource('office', 'OfficeController');
        Route::resource('time', 'TimeController');
        Route::resource('question', 'QuestionController');
        Route::resource('unit', 'UnitController');
        Route::resource('feedback-status', 'FeedbackStatusController');
        Route::resource('user', 'UserController');
        Route::put('user-update-status', 'UserController@updateStatus');
    });

    Route::group(['namespace' => 'Okrs', 'as' => 'okrs.'], function () {
        Route::resource('okr', 'OkrController');
        Route::resource('create-cfrs','CfrsController');
        Route::get('/settings/objective','OkrController@objective');
        Route::put('update-done-okr', 'OkrController@updateDoneOkr');
    });

    Route::group(['namespace' => 'Checkins', 'as' => 'checkins.'], function () {
        Route::resource('checkin', 'CheckinController');
        Route::get('get-okr-child','CheckinController@getOkr');
        Route::get('get-target-okr','CheckinController@getTarget');
        Route::get('get-feedback-status-department/{okr_id}','CheckinController@getFeedbackDepartment');
        Route::post('phan-hoi-lan-1','CheckinController@phanHoiLan1');
        Route::resource('summary','SummaryController');
        Route::resource('feedback2','Feedback2Controller');
        Route::get('/get-user-with-okr/{okr_id}','Feedback2Controller@getUserWithOkr');
        Route::put('update-target','CheckinController@updateTarget');
        Route::delete('delete-target/{target_id}','CheckinController@deleteTarget');
        Route::post('create-target','CheckinController@createTarget');
        Route::get('get-target-detail/{target_id}','CheckinController@getDetailTarget');
    });

    Route::group(['namespace' => 'Store','prefix' => 'store', 'as' => 'store.'], function () {
        Route::resource('categories', 'CategoryController');
        Route::resource('products', 'ProductController');
        Route::resource('orders', 'OrderController');
        Route::put('update-status-product', 'ProductController@updateStatus');
    });

    Route::resource('orders','Store\OrderController');
    Route::put('update-status-order','Store\OrderController@updateStatus');
    Route::resource('reward-exchange','Store\RewardExchangeController');
    Route::get('profile','Settings\UserController@profile');
    Route::post('profile','Settings\UserController@updateProfile');
    Route::get('change-password','Settings\UserController@changePassword');
    Route::put('update-password','Settings\UserController@updatePassword');
    Route::get('search-cfrs-department','HomeController@searchCfrs');




});
