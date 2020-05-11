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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group([ 'middleware'=>['role:admin_user']], function () {
    Route::get('/admin/index', 'AdminController@index')->name('admin.index');

});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/user', 'UserController');
Route::get('/users', 'UserController@index')->name('users');
Route::get('/courses', 'AdminController@allCourses')->name('courses');
Route::get('/courses/create', 'CourseController@create')->name('courses.create');
Route::get('/courses/teacher/newCourse', 'TeacherController@newCourse')->name('courses.teacher.newCourse');
Route::post('/courses/teacher/storeCourse', 'TeacherController@storeCourse')->name('courses.teacher.storeCourse');
Route::get('/courses/teacher/edit/{id}', 'TeacherController@edit')->name('courses.teacher.edit');
Route::post('/courses/teacher/update/{id}', 'TeacherController@update')->name('courses.teacher.update');
Route::get('/courses/teacher/teacherCourse', 'TeacherController@teacherCourse')->name('courses.teacher.teacherCourse');
Route::post('/courses/store','CourseController@store')->name('courses.store');
Route::get('/courses/users/delete/{course_id}/{user_id}','CourseController@deleteUser')->name('courses.users.delete');
Route::get('/users/join/{id}','UserController@join')->name('users.join');
Route::get('/course/show/{id}','UserController@showCourse')->name('course.showCourse');
Route::get('users/courses','UserController@viewCourses')->name('users.courses');

Route::get('/courses/users/{id}','TeacherController@viewUsers')->name('courses.users');

Route::get('/user/edit/{id}', 'AdminController@edit')->name('user.edit');
Route::get('/user/delete/{id}', 'AdminController@delete')->name('user.delete');
Route::post('/user/update/{id}','AdminController@update')->name('user.update');
