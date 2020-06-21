<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
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
            toast('Imported Successfully', 'success');
            return redirect('/admin/students')->with('status', 'Imported Successfully');
        }

        return redirect('/admin/students')->withErrors($validator)->withInput();
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
        }

        return redirect('/admin/faculty')->withErrors($validator)->withInput();
    }
    
    public function addStudent(Request $request)
    {
        $validator=Validator::make($request->all(), [
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
            DB::beginTransaction();

            try {
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
                DB::commit();
                return redirect('/admin/students/add')->with('success', 'Student Successfully Added');
            } catch (Exception $e) {
                DB::rollBack();
                return redirect('/admin/students/add')->with('failed', 'Student Registration Failed');
            }
        }

        return redirect('/admin/students/add')->withErrors($validator)->withInput();
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
            $data=$request->all();

            DB::beginTransaction();
            try {
                $department=Department::where('name', $data['department'])->first();
                $user_id=User::create([
                    'full_name'=>$data['full_name'],
                    'father_name'=>$data['father_name'],
                    'department'=>$department->id,
                    'mobile'=>$data['mobile'],
                    'email'=>$data['email'],
                    'password'=>Hash::make('12345678'),
                    'address'=>$data['address'],
                    'type'=>'faculty'
                ])->id;
                Management::create([
                    'user_id'=>$user_id,
                    'designation'=>$data['designation'],
                    'qualification'=>$data['qualification'],
                    'salary'=>$data['salary'],
                    'lop'=>0,
                    'ccl'=>0
                ]);
                DB::commit();
                return redirect('/admin/faculty/add')->with('success', 'Faculty Successfully Added');
            } catch (Exception $e) {
                DB::rollBack();
                return redirect('/admin/faculty/add')->with('failed', 'Faculty Registration Failed');
            }
        }

        return redirect('/admin/faculty/add')->withErrors($validator)->withInput();
    }
   
    public function addSubject(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'code'=>'required|unique:subjects',
            'name'=>'required',
            'credits'=>'required',
            'department'=>'required'
        ]);

        if ($validator->passes()) {
            Subject::create([
                'code'=>$request->input('subject_code'),
                'name'=>$request->input('sname'),
                'credits'=>$request->input('credits'),
                'department'=>$request->input('dept'),
            ]);
            return redirect('/admin/subjects/add')->with('success', 'Subject Added Successfully');
        }

        return redirect('/admin/subjects/add')->withErrors($validator)->withInput();
    }

    public function addDepartment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|unique:departments',
        ]);

        if ($validator->passes()) {
            Department::create([
                'name'=>$request->input('name'),
                'hod'=>null
                ]);
            return redirect('/admin/departments/add')->with('success', 'Department Added Successfully');
        }

        return redirect('/admin/departments/add')->withErrors($validator)->withInput();
    }

    public function addClassroom(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'department'=>'required',
            'year'=>'required',
            'section'=>'required',
            'class_teacher'=>'required|unique:classrooms|integer'
        ]);
        if ($validator->passes()) {
            $department=Department::where('name', $request->input('department'))->first();
            Classroom::create([
                'department'=>$department->id,
                'year'=>$request->input('year'),
                'section'=>$request->input('section'),
                'class_teacher'=>$request->input('class_teacher')
            ]);

            return redirect('/admin/classrooms/add')->with('success', 'Classroom added succesfully');
        }
        return redirect('/admin/classrooms/add')->withErrors($validator)->withInput();
    }

    public function updateStudent(Request $request, $id)
    {
        $validator=Validator::make($request->all(), [
            'full_name'=>'required',
            'father_name'=>'required',
            'department'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'address'=>'required',
            'year'=>'required',
            'section'=>'required',
        ]);

        if ($validator->passes()) {
            $department=Department::where('name', $request->input('department'))->first();

            $classroom=Classroom::where('department', $department->id)
            ->where('year', $request->input('year'))
            ->where('section', $request->input('section'))->first();

            $student=Student::findOrFail($id);
            $user_id=$student->student_id;
            $student->classroom_id=$classroom->id;
            $student->update();
            
            $user=User::findOrFail($user_id);
            $user->full_name=$request->input('full_name');
            $user->father_name=$request->input('father_name');
            $user->department=$department->id;
            $user->mobile=$request->input('mobile');
            $user->email=$request->input('email');
            $user->address=$request->input('address');
            $user->update();
            toast('Student Details Updated Successfully','success')->position('bottom-end')->autoClose(2000);
            return redirect('/admin/students');
        }

        return redirect('/admin/students')->withErrors($validator)->withInput();
    }

    public function updateFaculty(Request $request, $id)
    {
        $validator=Validator::make($request->all(), [
            'full_name'=>'required',
            'department'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'address'=>'required',
            'designation'=>'required',
            'qualification'=>'required',
        ]);

        if ($validator->passes()) {
            $department=Department::where('name', $request->input('department'))->first();

            $faculty=Management::findOrFail($id);
            $user_id=$faculty->user_id;
            $faculty->qualification=$request->input('qualification');
            $faculty->designation=$request->input('designation');
            $faculty->update();
            
            $user=User::findOrFail($user_id);
            $user->full_name=$request->input('full_name');
            $user->department=$department->id;
            $user->mobile=$request->input('mobile');
            $user->email=$request->input('email');
            $user->address=$request->input('address');
            $user->update();
            toast('Faculty Details Updated Successfully','success')->position('bottom-end')->autoClose(2000);
            return redirect('/admin/faculty');
        }

        return redirect('/admin/faculty')->withErrors($validator)->withInput();
    }

    public function updateDepartment(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'hod'=>'required|unique:departments,hod',
        ]);

        if ($validator->passes()) {
            $hod=$this->getFacultyID($request->input('hod'));
            $department=Department::findOrFail($id);
            $department->name=$request->input('name');
            $department->hod=$hod;
            $department->update();
            toast('Department Details Updated Successfully','success')->position('bottom-end')->autoClose(2000);
            return redirect('/admin/departments');
        }

        return redirect('/admin/departments')->withErrors($validator)->withInput();
    }

    public function updateSubject(Request $request, $id)
    {
        $validator=Validator::make($request->all(), [
            'subject_code'=>'required',
            'sname'=>'required',
            'dept'=>'required',
            'credits'=>'required',
        ]);
        
        if ($validator->passes()) {
            $subject=Subject::findOrFail($id);
            $subject->code=$request->input('subject_code');
            $subject->name=$request->input('sname');
            $subject->department=$request->input('dept');
            $subject->credits=$request->input('credits');
            $subject->update();
            toast('Subject Details Updated Successfully','success')->position('bottom-end')->autoClose(2000);
            return redirect('/admin/subjects');
        }
        return redirect('/admin/subjects')->withErrors($validator)->withInput();
    }

    public function updateClassroom(Request $request, $id)
    {
        $validator=Validator::make($request->all(), [
            'department'=>'required',
            'year'=>'required',
            'section'=>'required',
            'class_teacher'=>'required|unique:classrooms'
        ]);
        
        if ($validator->passes()) {
            $department=Department::where('name', $request->input('department'))->first();
            $classteacher=$this->getFacultyID($request->input('class_teacher'));
            $classroom=Classroom::findOrFail($id);
            $classroom->department=$department->id;
            $classroom->year=$request->input('year');
            $classroom->section=$request->input('section');
            $classroom->class_teacher=$classteacher;
            $classroom->update();
            toast('Classroom Details Updated Successfully','success')->position('bottom-end')->autoClose(2000);
            return redirect('/admin/classrooms');
        }
        return redirect('/admin/classrooms')->withErrors()->withInput();
    }
    
    public function getFacultyID($input)
    {
        if (is_numeric($input)) {
            return $input;
        } else {
            $user_id=User::where('full_name', $input)->first();
            $classteacher=Management::where('user_id', $user_id->id)->pluck('id')->first();
            return $classteacher;
        }
    }

    public function deleteStudent($id)
    {
        $student=Student::findOrFail($id);
        $user_id=$student->student_id;
        User::findOrFail($user_id)->delete();
        $student->delete();
        toast('Student Deleted Successfully','error')->position('bottom-end')->autoClose(2000);
        return redirect('/admin/students');
    }
    
    public function deleteFaculty($id)
    {
        $faculty=Management::findOrFail($id);
        $user_id=$faculty->user_id;
        User::findOrFail($user_id)->delete();
        $faculty->delete();
        toast('Faculty Deleted Successfully','error')->position('bottom-end')->autoClose(2000);
        return redirect('/admin/faculty');
    }

    public function deleteClassroom($id)
    {
        Classroom::findOrFail($id)->delete();
        toast('Classroom Deleted Successfully','error')->position('bottom-end')->autoClose(2000);
        return redirect('/admin/classrooms');
    }

    public function deleteSubject($id)
    {
        Subject::findOrFail($id)->delete();
        toast('Subject Deleted Successfully','error')->position('bottom-end')->autoClose(2000);
        return redirect('/admin/subjects');
    }
    
    public function deleteDepartment($id)
    {
        Department::findOrFail($id)->delete();
        toast('Department Deleted Successfully','error')->position('bottom-end')->autoClose(2000);
        return redirect('/admin/departments');
    }
}
