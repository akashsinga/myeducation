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
        $complaint_count=DB::table('complaints')->where('status', 'pending')->count();
        $leave_count=DB::table('leaveapplications')->where('status', 'pending')->count();
        $classroom_count=Classroom::all()->count();
        return view('admin.dashboard')
        ->with('student_count', $student_count)
        ->with('faculty_count', $faculty_count)
        ->with('classroom_count', $classroom_count)
        ->with('complaint_count', $complaint_count)
        ->with('leave_count',$leave_count);
    }

    public function viewDepartments()
    {
        $departments=DB::table('departments')
        ->leftJoin('management', 'management.id', '=', 'departments.hod')
        ->leftJoin('users', 'users.id', '=', 'management.user_id')
        ->select('departments.id', 'departments.name', DB::raw('IFNULL( users.full_name,"Not Assigned") as full_name'))
        ->get();
        return view('admin.managedepartments')
        ->with('departments', $departments);
    }

    public function viewStudents()
    {
        $departments=Department::all();
        $years=Classroom::select('year')->distinct()->get();
        $sections=Classroom::select('section')->distinct()->get();
        $students=DB::table('users')
            ->join('students', 'students.student_id', '=', 'users.id')
            ->join('classrooms', 'classrooms.id', '=', 'students.classroom_id')
            ->join('departments', 'departments.id', '=', 'users.department')
            ->select('students.id', 'users.full_name', 'users.father_name', 'departments.name', 'classrooms.year', 'classrooms.section', 'users.mobile', 'users.email', 'users.address')
            ->get();
        return view('admin.managestudents')->with('students', $students)->with('departments', $departments)->with('years', $years)->with('sections', $sections);
    }

    public function viewFaculty()
    {
        $departments=Department::all();
        $faculty=DB::table('users')
            ->join('management', 'management.user_id', '=', 'users.id')
            ->join('departments', 'departments.id', '=', 'users.department')
            ->select('management.id', 'users.full_name', 'departments.name', 'management.designation', 'management.qualification', 'users.mobile', 'users.email', 'users.address')
            ->get();
        return view('admin.managefaculty')->with('faculty', $faculty)->with('departments', $departments);
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
        $departments=Department::all();
        $years=Classroom::select('year')->distinct()->get();
        $sections=Classroom::select('section')->distinct()->get();
        $classrooms=DB::table('classrooms')
            ->join('departments', 'departments.id', '=', 'classrooms.department')
            ->join('management', 'classrooms.class_teacher', '=', 'management.id')
            ->join('users', 'users.id', '=', 'management.user_id')
            ->select('classrooms.id', 'departments.name', 'classrooms.year', 'classrooms.section', 'users.full_name')
            ->get();
        return view('admin.manageclassrooms')
        ->with('classrooms', $classrooms)
        ->with('departments', $departments)
        ->with('years', $years)
        ->with('sections', $sections);
    }

    public function viewSubjects()
    {
        $subjects=DB::table('subjects')
        ->join('departments', 'departments.id', "=", 'subjects.department')
        ->select('subjects.id', 'subjects.name', 'subjects.credits', 'subjects.code', 'departments.name as Dept_name')
        ->get();
        return view('admin.managesubjects')
        ->with('subjects', $subjects);
    }

    public function viewSchedule()
    {
        return view('admin.academicschedule');
    }
    
    public function viewLeaveApplications()
    {
        $leaveapplications=DB::table('leaveapplications')
        ->where('status', 'pending')
        ->join('users', 'users.id', '=', 'leaveapplications.faculty_id')
        ->join('departments', 'departments.id', '=', 'users.department')
        ->select('departments.name', 'users.full_name', 'leaveapplications.id', 'leaveapplications.start_date', 'leaveapplications.end_date', 'leaveapplications.reason', 'leaveapplications.no_of_days', 'leaveapplications.leave_type', 'leaveapplications.status')
        ->get();
        return view('admin.leaveapplications')
        ->with('leaves', $leaveapplications);
    }

    public function viewAddClassroom()
    {
        $departments=Department::all();
        return view('admin.forms.addclassroom')
        ->with('departments', $departments);
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
        $departments=Department::select('id', 'name')->get();
        return view('admin.forms.addfaculty')
        ->with('departments', $departments);
    }

    public function viewAddSubject()
    {
        $departments=Department::select('id', 'name')->distinct()->get();
        return view('admin.forms.addsubject')
        ->with('departments', $departments);
    }

    public function viewClassroomDetails($id)
    {
        $classroom=Classroom::findOrFail($id);
        $department=Department::where('id', $classroom->department)->pluck('name')[0];
        $classteacher=DB::table('classrooms')
        ->join('management', 'management.id', '=', 'classrooms.class_teacher')
        ->join('users', 'users.id', '=', 'management.user_id')
        ->pluck('users.full_name')[0];
        $students=DB::table('students')
        ->where('classroom_id', $id)
        ->join('classrooms', 'classrooms.id', '=', 'students.classroom_id')
        ->join('users', 'users.id', '=', 'students.student_id')
        ->join('departments', 'departments.id', '=', 'classrooms.department')
        ->select('students.id', 'users.full_name', 'users.mobile', 'users.email')
        ->get();
        return view('admin.classroomdetails')
        ->with('students', $students)
        ->with('classroom', $classroom)
        ->with('department', $department)
        ->with('classteacher', $classteacher);
    }
}
