<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use App\Models\Classroom;
use App\Models\Department;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Management;
use App\Imports\StudentImport;
use Hash;
use DB;

class AdminController extends Controller
{
    public function importStudents(Request $request)
    {
        $validator=Validator::make($request->all(), [
          'importfile'=>'required|mimes:xls,xlsx'
        ]);
        if ($validator->passes()) {
            $path=$request->file('importfile')->getRealPath();
            $import_status=Excel::import(new StudentImport, $path);
            return redirect('/admin/students')->with('status', 'Imported Successfully');
        } else {
            return redirect('/admin/students')->withErrors($validator)->withInput();
        }
    }

    public function importFaculty(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'importfile'=>'required|mimes:xls,xlsx'
          ]);
        if ($validator->passes()) {
            $path=$request->file('importfile')->getRealPath();
            $import_status=Excel::import(new FacultyImport, $path);
            return redirect('/admin/faculty')->with('status', 'Imported Successfully');
        } else {
            return redirect('/admin/faculty')->withErrors($validator)->withInput();
        }
    }
    
    public function addStudent(Request $request)
    {
        $validator=Validation::make($request->all(), [
            'full_name'=>'required',
            'father_name'=>'required',
            'department'=>'required',
            'mobile'=>'required|max:13|unique:users',
            'email'=>'required',
            'address'=>'required',
            'year'=>'required',
            'section'=>'required',
        ]);
        if ($validator->passes()) {
            DB::transaction(function () {
                $department=Department::where('name', $request->input('department'))->first();
                $user_id=User::create([
                    'full_name'=>$request->input('full_name'),
                    'father_name'=>$request->input('father_name'),
                    'department'=>$department->id,
                    'mobile'=>$request->input('mobile'),
                    'email'=>$request->input('email'),
                    'password'=>Hash::make('12345678'),
                    'address'=>$request->input('address'),
                    'type'=>'student'
                ])->id;
                $classroom=Classroom::where('department', $department->id)
                ->where('year', $request->input('year'))
                ->where('section', $request->input('section'))
                ->first();
                Student::create([
                    'student_id'=>$user_id,
                    'rollnumber'=>'',
                    'classroom_id'=>$classroom->id,
                    'score'=>0
                ]);
                return redirect('/admin/students/add')->with('success', 'Student Successfully Added');
            });
        } else {
            return redirect('/admin/students/add')->withErrors($validator)->withInput();
        }
        return redirect('/admin/students/add')->with('failed', 'Student Registration Failed');
    }

    public function addFaculty(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'full_name'=>'required',
            'father_name'=>'required',
            'department'=>'required',
            'mobile'=>'required|max:13|unique:users',
            'email'=>'required',
            'address'=>'required',
            'qualification'=>'required',
            'designation'=>'required',
            'salary'=>'required'
        ]);
        if ($validator->passes()) {
            DB::transaction(function () {
                $department=Department::where('name', $request->input('department'))->first();
                $user_id=User::create([
                    'full_name'=>$request->input('full_name'),
                    'father_name'=>$request->input('father_name'),
                    'department'=>$department->id,
                    'mobile'=>$request->input('mobile'),
                    'email'=>$request->input('email'),
                    'password'=>Hash::make('12345678'),
                    'address'=>$request->input('address'),
                    'type'=>'faculty'
                ])->id;
                Management::create([
                    'user_id'=>$user_id,
                    'designation'=>$request->input('designation'),
                    'qualification'=>$request->input('qualification'),
                    'salary'=>$request->input('salary'),
                    'lop'=>0,
                    'ccl'=>0
                ]);
                return redirect('/admin/faculty/add')->with('success', 'Faculty Successfully Added');
            });
        } else {
            return redirect('/admin/faculty/add')->withErrors($validator)->withInput();
        }
        return redirect('/admin/faculty/add')->with('failed', 'Faculty Registration Failed');
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
        $validator = Validator::make($request->all(), [
            'name'=>'required|unique:departments',
        ]);
        if ($validator->passes()) {
            Department::create([
                'name'=>$request->input('department_name'),
                'hod'=>''
                ]);
            return redirect('/admin/departments/add')->with('success', 'Department Added Successfully');
        }
        return redirect('/admin/departments/add')->withErrors($validator)->withInput();
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

    public function approveLeave($id)
    {
    }
}
