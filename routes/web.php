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
Route::get('/create', 'ReportingController@create')->name('reporting.create');
Route::get('/report-success', 'ReportingController@success')->name('reporting.success');
Route::get('/tracking', 'ReportingController@tracking')->name('reporting.tracking');
// end::reporting
