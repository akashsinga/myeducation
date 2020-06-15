<?php

namespace App\Http\Controllers;

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
use App\Imports\FacultyImport;

class AdminController extends Controller
{
    protected $user;
    protected $management;
    protected $student;
    //VIEWS
    public function index()
    {
        $student_count=DB::table('users')->where('type', 'student')->count();
        $faculty_count=DB::table('users')->where('type', 'faculty')->count();
        $classroom_count=Classroom::all()->count();
        return view('admin.dashboard')
        ->with('student_count', $student_count)
        ->with('faculty_count', $faculty_count)
        ->with('classroom_count', $classroom_count);
    }

    public function viewDepartments()
    {
        $departments=Department::paginate(15);
        return view('admin.managedepartments')->with('departments', $departments);
    }

    public function viewStudents()
    {
        $students=DB::table('users')
        ->join('students', 'students.student_id', '=', 'users.id')
        ->join('classrooms', 'classrooms.id', '=', 'students.classroom_id')
        ->join('departments', 'departments.id', '=', 'users.department')
        ->select('students.id', 'users.full_name', 'users.father_name', 'departments.name', 'classrooms.year', 'classrooms.section', 'users.mobile', 'users.email')
        ->paginate(15);
        return view('admin.managestudents')->with('students', $students);
    }

    public function viewFaculty()
    {
        $faculty=DB::table('users')
        ->join('management', 'management.user_id', '=', 'users.id')
        ->join('departments', 'departments.id', '=', 'users.department')
        ->select('management.id', 'users.full_name', 'departments.name', 'management.designation', 'management.qualification', 'users.mobile', 'users.email')
        ->paginate(15);
        return view('admin.managefaculty')->with('faculty', $faculty);
    }

    public function viewClassrooms()
    {
        $classrooms=DB::table('classrooms')
        ->join('departments', 'departments.id', '=', 'classrooms.department')
        ->join('management', 'classrooms.class_teacher', '=', 'management.id')
        ->join('users', 'users.id', '=', 'management.user_id')
        ->select('classrooms.id', 'departments.name', 'classrooms.year', 'classrooms.section', 'users.full_name')
        ->paginate(15);
        return view('admin.manageclassrooms')->with('classrooms', $classrooms);
    }

    public function viewSubjects()
    {
        $subjects=DB::table('subjects')
        ->join('departments', 'departments.id', "=", 'subjects.department')
        ->select('subjects.id', 'subjects.name', 'subjects.credits', 'subjects.code', 'departments.name as Dept_name')
        ->paginate(15);
        return view('admin.managesubjects')->with('subjects', $subjects);
    }

    public function viewSchedule()
    {
        return view('admin.academicschedule');
    }
    
    public function viewLeaveApplications()
    {
        return view('admin.leaveapplications');
    }

    public function viewAddClassroom()
    {
        $departments=Department::all();
        return view('admin.forms.addclassroom')->with('departments', $departments);
    }

    public function viewAddStudent()
    {
        $departments=Department::select('id', 'name')->distinct()->get();
        $years=Classroom::select('year')->distinct()->get();
        $sections=Classroom::select('section')->distinct()->get();
        return view('admin.forms.addstudent')
        ->with('departments', $departments)
        ->with('years', $years)
        ->with('sections', $sections);
    }

    public function viewAddDepartment()
    {
        return view('admin.forms.adddepartments');
    }

    public function viewAddFaculty()
    {
        $departments=Department::select('id', 'name')->distinct()->get();
        return view('admin.forms.addfaculty')->with('departments', $departments);
    }

    public function viewAddSubject()
    {
        $departments=Department::select('id', 'name')->distinct()->get();
        return view('admin.forms.addsubject')->with('departments', $departments);
    }
    //FUNCTIONALITIES
    public function importStudents(Request $request)
    {
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
        $classroom_id=Classroom::where('year', $request->input('year'))->where('section', $request->input('section'))->get();
        $c=1;
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
