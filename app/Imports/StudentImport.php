<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\User;
use Hash;
use DB;
use App\Models\Classroom;
use App\Models\Department;
use App\Models\Student;

class StudentImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            DB::beginTransaction();
            try {
                $department=Department::where('name', $row[2])->first();
                $user=User::create([
                    'full_name'=>$row[0],
                    'father_name'=>$row[1],
                    'department'=>$department[0]->id,
                    'mobile'=>$row[3],
                    'email'=>$row[4],
                    'password'=>Hash::make('12345678'),
                    'address'=>$row[5],
                    'type'=>"student"
                ]);
                $user_id=$user->id;
                $classroom=Classroom::where('department', $department->id)->where('year', $row[7])->where('section', $row[8])->first();
                $student=Student::create([
                    'student_id'=>$user_id,
                    'rollnumber'=>'',
                    'classroom_id'=>$classroom->id,
                    'score'=>0
                ]);
                if($user && $student) {
                    DB::commit();
                } else {
                    DB::rollback();
                }
            } catch (Exception $e) {
                DB::rollback();
            }
        }
    }
}
