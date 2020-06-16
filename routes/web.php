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

Auth::routes(['register'=>true]);

Route::group(['middleware'=>['auth','admin']], function () {
    //admin group
    Route::get('/home', function () {
        return redirect('admin/dashboard');
    });
    Route::get('/admin', function () {
        return redirect('admin/dashboard');
    });
    //view main pages
    Route::get('/admin/dashboard', 'Admin\PagesController@index');
    Route::get('/admin/departments', 'Admin\PagesController@viewDepartments');
    Route::get('/admin/students', 'Admin\PagesController@viewStudents')->name('admin.students');
    Route::get('/admin/faculty', 'Admin\PagesController@viewFaculty');
    Route::get('/admin/complaints', 'Admin\PagesController@viewComplaints');
    Route::get('/admin/classrooms', 'Admin\PagesController@viewClassrooms')->name('admin.classrooms');
    Route::get('/admin/subjects', 'Admin\PagesController@viewSubjects');
    Route::get('/admin/schedule', 'Admin\PagesController@viewSchedule');
    Route::get('/admin/leaves/applications', 'Admin\PagesController@viewLeaveApplications');

    //add view routes
    Route::get('/admin/students/add', 'Admin\PagesController@viewAddStudent');
    Route::get('/admin/faculty/add', 'Admin\PagesController@viewAddFaculty');
    Route::get('/admin/subjects/add', 'Admin\PagesController@viewAddSubject');
    Route::get('/admin/classrooms/add', 'Admin\PagesController@viewAddClassroom');
    Route::get('/admin/departments/add', 'Admin\PagesController@viewAddDepartment');

    //add-form submits
    Route::post('/admin/students/add/submit', 'AdminController@storeUser');
    Route::post('/admin/faculty/add/submit', 'AdminController@storeUser');
    Route::post('/admin/department/add/submit', 'AdminController@addDepartment');
    Route::post('/admin/subject/add/submit', 'AdminController@addSubject');
    Route::post('/admin/classroom/add/submit', 'AdminController@addClassroom');
    //leave approvals
    Route::post('/admin/leaves/applications/approve/{id}', 'AdminController@approveLeave');
    Route::post('/admin/leaves/applications/reject/{id}', 'AdminController@rejectLeave');//check here
    //import routes
    Route::post('/admin/students/import/submit', 'AdminController@importStudents');
    //edit routes
    Route::post('/admin/students/edit/{id}', 'AdminController@editStudent')->name('admin.students.edit');
    Route::post('/admin/classrooms/edit/{id}', 'AdminController@editStudent')->name('admin.classrooms.edit');
    //delete routes
    Route::post('/admin/students/delete/{id}', 'AdminController@editStudent')->name('admin.students.delete');
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
