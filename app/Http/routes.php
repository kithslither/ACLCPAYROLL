<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();
	Route::get('/', function () {
	    return view('welcome');
	});
    Route::post('/employees/auth', 'EmployeeController@auth');
    Route::get('/employees/dashboard', 'EmployeeController@dashboard');
    Route::get('/employees/leave', 'Employeecontroller@leave');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('employees', 'EmployeeController');
    Route::resource('appointments', 'AppointmentController', ['only' =>[
    	'store'
    ]]);
    Route::resource('paychecks', 'PaycheckController', ['only' =>[
    	'store', 'create', 'index'
    ]]);
    Route::post('/paychecks/pay', 'PaycheckController@pay');
});
