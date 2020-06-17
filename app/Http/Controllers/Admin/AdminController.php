<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Hash;
use App\User;
use App\Models\Classroom;
use DB;
use App\Models\Department;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Management;
use App\Imports\StudentImport;

class AdminController extends Controller
{
    //FUNCTIONALITIES
    public function importStudents(Request $request)
    {
        $this->validate($request,[
            'importfile'=>'required | mimes:xls,xlsx',
        ]);
        $path=$request->file('importfile')->getRealPath();
        $import_status=Excel::import(new StudentImport, $path);
        return redirect('/admin/students')->with('status', 'Imported Successfully');
    }

    public function importFaculty(Request $request)
    {
        $path=$request->file('importfile')->getRealPath();
        $import_status=Excel::import(new FacultyImport, $path);
        return redirect('/admin/faculty')->with('status', 'Imported Successfully');
    }
    
    public function storeUser(Request $request)
    {
        DB::beginTransaction();
        try {
            $add_status=$this->addUser($request);
            $type=$request->input('type');
            if ($add_status) {
                DB::commit();
                return ($type=="student")?redirect('/admin/students/add')
                ->with('status', 'Student Added Successfully'):redirect('/admin/faculty/add')
                ->with('status', 'Faculty Added Successfully');
            } else {
                DB::rollBack();
            }
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function addUser(Request $request)
    {
        $this->validate($request,[
            'full_name'=>'required',
            'father_name'=>'required',
            'department'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'address'=>'required',
            'type'=>'required'
        ]);
        $user=new User();
        $user->full_name=$request->input('full_name');
        $user->father_name=$request->input('father_name');
        $user->department=$request->input('department');
        $user->mobile=$request->input('mobile');
        $user->email=$request->input('email');
        $user->password=Hash::make('12345678');
        $user->address=$request->input('address');
        $user->type=$request->input('type');
        if ($user->save()) {
            if ($user->type=="faculty") {
                $faculty_status=$this->addManagement($request, $user->id);
                return $faculty_status;
            } elseif ($user->type=="student") {
                $student_status=$this->addStudent($request, $user->id);
                return $student_status;
            }
        } else {
            return false;
        }
    }

    public function addStudent(Request $request, $id)
    {
        $this->validate($request,[
            'year'=>'required',
            'section'=>'required',
        ]);
        $classroom_id=Classroom::where('department',$request->input('department'))->where('year', $request->input('year'))->where('section', $request->input('section'))->get();
        $c=0;
        foreach ($classroom_id as $class) {
            $c=$class->id;
        }
        $student=new Student();
        $student->student_id=$id;
        $student->rollnumber='';
        $student->classroom_id=$c;
        $student->score=0;
        return ($student->save())?true:false;
    }

    public function addManagement(Request $request, $id)
    {
        $this->validate($request,[
            'designation'=>'required',
            'qualification'=>'required',
            'salary'=>'required',
        ]);
        $management=new Management();
        $management->user_id=$id;
        $management->designation=$request->input('designation');
        $management->qualification=$request->input('qualification');
        $management->salary=$request->input('salary');
        $management->lop=0;
        $management->ccl=0;
        return ($management->save())?true:false;
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

    public function approveLeave($id)
    {
    }
}
