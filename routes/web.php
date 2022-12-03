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

// begin::reporting
Route::get('/', 'ReportingController@index')->name('reporting.index');
Route::get('/detail', 'ReportingController@show')->name('reporting.detail');
Route::get('/create', 'ReportingController@create')->name('reporting.create');
Route::get('/report-success', 'ReportingController@success')->name('reporting.success');
Route::get('/tracking', 'ReportingController@tracking')->name('reporting.tracking');
// end::reporting

// admin
Route::prefix('admin')->group(function() {
    Route::post('/login/auth', 'AuthController@login')->name('admin.login.post');
    Route::get('/login', 'AuthController@index')->name('admin.login');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/report', 'ReportingController@indexAdmin')->name('admin.reporting.index');
    Route::get('/report/ajax', 'ReportingController@ajaxReportAdmin')->name('admin.reporting.ajax');
    Route::get('/message', 'MessageController@index')->name('admin.message.index');
    Route::get('/message/ajax', 'MessageController@ajax')->name('admin.message.ajax');
});