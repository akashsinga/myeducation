<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
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
}
