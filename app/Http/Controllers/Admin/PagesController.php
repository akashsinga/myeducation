<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Classroom;
use DataTables;
use App\Models\Department;

class PagesController extends Controller
{
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
        if (request()->ajax()) {
            $students=DB::table('users')
            ->join('students', 'students.student_id', '=', 'users.id')
            ->join('classrooms', 'classrooms.id', '=', 'students.classroom_id')
            ->join('departments', 'departments.id', '=', 'users.department')
            ->select('students.id', 'users.full_name', 'users.father_name', 'departments.name', 'classrooms.year', 'classrooms.section', 'users.mobile', 'users.email')
            ->get();
            return Datatables::of($students)->addColumn('action', function ($query) {
                return 
                '<a href="' . route("admin.students.edit", $query->id) . '" class="btn btn-warning btn-sm"><i class="material-icons">edit</i></a>
                <a href="' . route('admin.students.delete', $query->id) . '" class="btn btn-danger btn-sm"><i class="material-icons">clear</i></a>
                ';
            })
            ->make(true);
        }
        return view('admin.managestudents');
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

    public function viewComplaints()
    {
        $complaints=DB::table("complaints")
        ->join('types', 'types.id', "=", "complaints.type")
        ->join('students', 'students.id', '=', 'complaints.student_id')
        ->join('classrooms', 'students.classroom_id', '=', 'classrooms.id')
        ->join('users', 'users.id', '=', 'students.student_id')
        ->join('departments', 'departments.id', '=', 'users.department')
        ->select('complaints.id', 'users.full_name', 'types.type', 'complaints.description', 'complaints.status', 'classrooms.year', 'classrooms.section', 'departments.name') ->paginate(15);
        return view('admin.complaints')->with('complaints', $complaints);
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
}
