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
}
