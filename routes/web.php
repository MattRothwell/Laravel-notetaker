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

Route::get('/', function () {
    return "<a href=\"login\">Project</a>";
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


