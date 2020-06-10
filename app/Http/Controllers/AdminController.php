<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\User;
use App\Models\Classroom;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function viewDepartments()
    {
        return view('admin.managedepartments');
    }
    public function viewStudents()
    {
        return view('admin.managestudents');
    }
    public function viewFaculty()
    {
        return view('admin.managefaculty');
    }
    public function viewClassrooms()
    {
        return view('admin.manageclassrooms');
    }
    public function viewAddClassroom()
    {
        return view('admin.forms.addclassroom');
    }
    public function viewSubjects()
    {
        return view('admin.managesubjects');
    }
    public function viewSchedule()
    {
        return view('admin.academicschedule');
    }
    public function viewAddStudent()
    {
        return view('admin.forms.addstudent');
    }
    public function viewAddFaculty()
    {
        return view('admin.forms.addfaculty');
    }
    public function viewAddSubject()
    {
        return view('admin.forms.addsubject');
    }
    public function addUser(Request $request)
    {
        User::create([
            'full_name' =>$request->input('full_name'),
            'father_name' =>$request->input('father_name'),
            'department' => $request->input('department'),
            'mobile' =>$request->input('mobile'),
            'email' => $request->input('email'),
            'password' => Hash::make('12345678'),
            'address' =>$request->input('address'),
            'type' => $request->input('type'),
        ]);
        switch ($request->input('type')) {
            case 'student':
                return redirect('/admin/students/add')->with('status', 'User Added Successfully');
            break;
            case 'faculty':
                return redirect('/admin/faculty/add')->with('status', 'User Added Successfully');
            break;
        }
    }
    public function AddClassroom(Request $request)
    {
        Classroom::create([
            'department'=>$request->input('department'),
            'year'=>$request->input('year'),
            'section'=>$request->input('section'),
            'class_teacher'=>$request->input('class_teacher')
        ]);
        return redirect('/admin/classrooms/add')->with('status','Classroom added succesfully');
    }
}
