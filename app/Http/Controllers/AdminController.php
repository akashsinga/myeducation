<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\User;
use App\Models\Classroom;
use DB;
use App\Models\Department;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Management;

class AdminController extends Controller
{
    protected $user;
    protected $management;
    protected $student;
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

    public function addUser(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->user=new User();
            $user=$this->user->create([
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
            if ($request->input('type')=='student') 
            {
                $classroom_id=Classroom::where('year', $request->input('year'))
                ->where('section', $request->input('section'))->get();
                $this->student=new Student();
                $student=$this->student->create([
                    'student_id'=>$user_id,
                    'rollnumber'=>'',
                    'classroom_id'=>$classroom_id,
                    'score'=>0
                ]);
            }
            elseif ($request->input('type')=='faculty') 
            {
                $this->management=new Management();
                $management=$this->management->create([
                    'user_id'=>$user_id,
                    'designation'=>$request->input('designation'),
                    'qualification'=>$request->input('qualification'),
                    'salary'=>$request->input('salary'),
                    'leaves'=>40
                ]);
            }
            if ($user && ($management || $student)) {
                DB::commit();
                return $request->input('type')=='student'?redirect('/admin/students/add')
                ->with('status', 'Student Added Successfully'):redirect('/admin/faculty/add')
                ->with('status', 'Faculty Added Successfully');
            } else {
                DB::rollBack();
            }
        } catch (Exception $e) {
            DB::rollBack();
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

    public function approveLeave($id)
    {
    }
}
