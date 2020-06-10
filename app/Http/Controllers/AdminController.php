<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\User;
use App\Models\Classroom;
use App\Models\Department;
use App\Models\Subject;
use App\Models\Student;

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
        $departments=Department::all();
        $classrooms=Classroom::all();
        return view('admin.forms.addstudent')->with('departments', $departments)->with('classrooms', $classrooms);
    }
    public function viewAddDepartment()
    {
        return view('admin.forms.adddepartments');
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
        $user_id=User::latest()->first()->id;
        switch ($request->input('type')) {
            case 'student':{
                $classroom=Classroom::select('id')->where('year', $request->input('year'))->where('section', $request->input('section'))->get();
                $id=1;
                foreach ($classroom as $c) {
                    $id=$c->id;
                }
                Student::create([
                    'student_id'=>$user_id,
                    'rollnumber'=>'',
                    'classroom_id'=>$id,
                    'score'=>0.0
                ]);
                return redirect('/admin/students/add')->with('status', 'Student Added Successfully');
            }
            break;
            case 'faculty':
                return redirect('/admin/faculty/add')->with('status', 'Faculty Added Successfully');
            break;
        }
    }
    public function addSubject(Request $request)
    {
        Subject::create([
            'code'=>$request->input('subject_code'),
            'name'=>$request->input('sname'),
            'credits'=>$request->input('credits'),
            'department'=>$request->input('dept'),
        ]);
        return redirect('/admin/subjects/add')->with('status', 'Subject Added Successfully');
    }
    public function addDepartment(Request $request)
    {
        Department::create([
            'name'=>$request->input('department_name'),
            'hod'=>' '
            ]);
        return redirect('/admin/departments/add')->with('status', 'Department Added Successfully');
    }
    public function addClassroom(Request $request)
    {
        Classroom::create([
            'department'=>$request->input('department'),
            'year'=>$request->input('year'),
            'section'=>$request->input('section'),
            'class_teacher'=>$request->input('class_teacher')
        ]);
        return redirect('/admin/classrooms/add')->with('status', 'Classroom added succesfully');
    }
}
