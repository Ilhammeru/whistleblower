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

// auth
Route::post('/login/auth', 'AuthController@login')->name('admin.login.post');
Route::get('/', 'AuthController@index')->name('admin.login');

Route::get('/reload/captcha', 'ReportingController@reloadCaptcha')->name('reload.captcha');

// begin::reporting
// Route::middleware('auth')->group(function() {
    Route::get('/report-success/{token}/{ticket}', 'ReportingController@success')->name('reporting.success');
    Route::get('/report', 'ReportingController@index')->name('reporting.index');
    Route::post('/report', 'ReportingController@store')->name('reporting.store');
    Route::get('/detail/{ticket}', 'ReportingController@show')->name('reporting.detail');
    Route::get('/create', 'ReportingController@create')->name('reporting.create');
    Route::get('/tracking/{ticket}', 'ReportingController@tracking')->name('reporting.tracking');
    Route::post('/tracking', 'ReportingController@trackReport')->name('reporting.track.report');
    Route::post('/report/additional/{id}', 'ReportingController@storeAdditional')->name('reporting.store.additional');
// });
// end::reporting

// admin
Route::prefix('admin')->group(function() {
    Route::get('/logout', 'AuthController@logout')->name('logout');

    Route::middleware('auth')->group(function() {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('/report', 'ReportingController@indexAdmin')->name('admin.reporting.index');
        Route::get('/report/ajax', 'ReportingController@ajaxReportAdmin')->name('admin.reporting.ajax');
        Route::get('/message', 'MessageController@index')->name('admin.message.index');
        Route::get('/message/ajax', 'MessageController@ajax')->name('admin.message.ajax');
    });
});