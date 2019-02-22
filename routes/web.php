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

Auth::routes();
Route::get('/subscriber/activate/{email}/{token}', 'Auth\RegisterController@activate')->name('subscriber.activate');

// user route
Route::get('/', 'HomeController@index')->name('home');

Route::resources([
    'todo' => 'Todo\TaskController', // todo resource route
]);

// mission route
Route::get('/mission', 'MissionController@index')->name('mission');
Route::patch('/mission/{id}', 'MissionController@update')->name('mission.update')->where('id', '[0-9]+');

// attendance route
Route::get('/attendance', 'AttendanceController@index')->name('attendance');

// report route
Route::post('/report/create', 'ReportController@create');

Route::get('/locale/{lang}', function($lang) {
    \Session::put('locale', $lang);
    return redirect()->back();
});

// Admin controller
Route::group(['namespace' => 'Admin'], function() {
    Route::get('admin/home', 'HomeController@index')->name('admin.home');

    // report routes
    Route::get('admin/report', 'ReportController@index')->name('admin.report');
    Route::get('admin/report/show/{id}', 'ReportController@show')->name('admin.report.show');

    // attendance route
    Route::get('admin/attendance', 'AttendanceController@index')->name('admin.attendance');
    Route::get('admin/attendance/search', 'AttendanceController@search')->name('admin.attendance.search');

    // all the resource route
	Route::resources([
        'admin/account' => 'AccountController', // account resource routes
        'admin/role' => 'RoleController', // role resource routes
        'admin/permission' => 'PermissionController', // permission resource routes
        'admin/profile' => 'ProfileController', // profile controller
        'admin/mission' => 'MissionController', // mission resource controller
    ]);

	// admin auth
	Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin-login', 'Auth\LoginController@login');
	Route::post('admin-logout', 'Auth\LoginController@logout')->name('admin.logout');
});

// routes for 2nd database connection
Route::get('get-meta', 'Lab\MetaController@getMeta');
Route::get('set-meta', 'Lab\MetaController@setMeta');

