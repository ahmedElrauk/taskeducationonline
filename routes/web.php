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
Route::get('/courses', 'CourseController@index')->name('courses');
Route::get('/courses/create', 'CourseController@create')->name('courses.create');
Route::get('/courses/teacher/newCourse', 'CourseController@newCourse')->name('courses.teacher.newCourse');
Route::post('/courses/teacher/storeCourse', 'CourseController@storeCourse')->name('courses.teacher.storeCourse');
Route::get('/courses/teacher/edit/{id}', 'CourseController@edit')->name('courses.teacher.edit');
Route::post('/courses/teacher/update/{id}', 'CourseController@update')->name('courses.teacher.update');
Route::get('/courses/teacher/teacherCourse', 'CourseController@teacherCourse')->name('courses.teacher.teacherCourse');
Route::post('/courses/store','CourseController@store')->name('courses.store');
Route::get('/courses/users/delete/{course_id}/{user_id}','CourseController@deleteUser')->name('courses.users.delete');
Route::get('/users/join/{id}','UserController@join')->name('users.join');
Route::get('/course/show/{id}','UserController@showCourse')->name('course.showCourse');
Route::get('users/courses','UserController@viewCourses')->name('users.courses');
//Route::get('/courses/users/delete/{user_id}',function (){
//    $user = App\Course::find(course_id)->users(user_id);
//    $user->delete();
//})->name('courses.users.delete');
Route::get('/courses/users/{id}','CourseController@viewUsers')->name('courses.users');

Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::get('/user/delete/{id}', 'UserController@destroy')->name('user.delete');
Route::post('/user/update/{id}','UserController@update')->name('user.update');

//
//Route::get('/course', 'CourseController@index')->name('course.index');
//
//Route::resource('/course', 'CourseController')->except('index', 'show')->middleware('auth');
//
//Route::get('/course/{course}/enroll', 'CourseController@enroll')->name('course.enroll');
//
//Route::get('/course/{course}/unenroll', 'CourseController@unenroll')->name('course.unenroll');
//
//Route::get('/course/{course}/complete', 'CourseController@complete')->name('course.complete');
//
//Route::get('/course/{course}', 'CourseController@show')->name('course.show');
//
//Route::resource('/user', 'UserController')->except('show')->middleware('auth');
//
//Route::get('/user/{user}/account', 'UserController@account')->name('user.account');
//
//Route::get('/dashboard', 'EnrollmentController@dashboard')->name('dashboard')->middleware('auth');
//
//Route::get('/dashboard/{user}/{course}/approve', 'EnrollmentController@approve')->name('enrollment.approve');
//
//Route::get('/dashboard/{user}/{course}/disapprove', 'EnrollmentController@disapprove')->name('enrollment.disapprove');
