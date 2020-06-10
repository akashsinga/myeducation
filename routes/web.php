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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/logout', function () {
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');
})->name('logout');

Auth::routes(['register'=>false]);
Route::group(['middleware'=>['auth','admin']], function () {
    Route::get('/home', function () {
        return redirect('admin/dashboard');
    });
    Route::get('/admin', function () {
        return redirect('admin/dashboard');
    });
    Route::get('/admin/dashboard', 'AdminController@index');
    Route::get('/admin/departments', 'AdminController@viewDepartments');
    Route::get('/admin/students', 'AdminController@viewStudents');
    Route::get('/admin/faculty', 'AdminController@viewFaculty');
    Route::get('/admin/classrooms', 'AdminController@viewClassrooms');
    Route::get('/admin/subjects', 'AdminController@viewSubjects');
    Route::get('/admin/schedule', 'AdminController@viewSchedule');
    Route::get('/admin/students/add', 'AdminController@viewAddStudent');
    Route::get('/admin/faculty/add', 'AdminController@viewAddFaculty');
    Route::get('/admin/subjects/add', 'AdminController@viewAddSubject');
    Route::post('/admin/students/add/submit', 'AdminController@addUser');
    Route::post('/admin/faculty/add/submit', 'AdminController@addUser');
});
Route::group(['middleware'=>['auth','student']], function () {
    Route::get('/home', function () {
        return redirect('student/dashboard');
    });
    Route::get('/student', function () {
        return redirect('student/dashboard');
    });
    Route::get('/student/dashboard', 'StudentController@index');
});
Route::group(['middleware'=>['auth','faculty']], function () {
    Route::get('/home', function () {
        return redirect('faculty/dashboard');
    });
    Route::get('/faculty', function () {
        return redirect('faculty/dashboard');
    });
    Route::get('/faculty/dashboard', 'FacultyController@index');
});
