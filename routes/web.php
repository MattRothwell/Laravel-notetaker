<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::post('course/subscribe', 'CourseController@subscribe');

Route::get('course/subscribe', 'CourseController@subscribe');

Route::get('/loginAttempt', 'Auth\LoginController@loginAttempt');
Route::get('/home', 'HomeController@index');
Route::get('course/find', 'CourseController@find');
Route::get('/user/colleagues', 'UserController@colleagues');


//Restful controller for courses
Route::resource('user', 'UserController');
Route::resource('course', 'CourseController');
Route::resource('course.module', 'ModuleController');
Route::resource('course.module.subject', 'SubjectController');
Route::resource('Tasks', 'TaskController');
Route::resource('Tests', 'TestController');

//Authenticate User
/*Route::controllers({
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
});*/




