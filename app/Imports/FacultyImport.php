<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class FacultyImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
        foreach ($collection as $row) {
            DB::beginTransaction();
            try {
                $department=Department::where('name', $row[2])->get();
                $user=User::create([
                    'full_name'=>$row[0],
                    'father_name'=>$row[1],
                    'department'=>$department[0]->id,
                    'mobile'=>$row[3],
                    'email'=>$row[4],
                    'password'=>Hash::make('12345678'),
                    'address'=>$row[5],
                    'type'=>'faculty'
                ]);
                $user_id=$user->id;
                $management=Management::create([
                    'user_id'=>$user_id,
                    'designation'=>$row[6],
                    'qualification'=>$row[7],
                    'salary'=>$row[8],
                    'lop'=>0,
                    'ccl'=>0
                ]);
                if ($user && $management) {
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
