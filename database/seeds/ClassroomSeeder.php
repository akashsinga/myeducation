<?php

use Illuminate\Database\Seeder;
use App\Models\Classroom;
class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Classroom::class,50)->create();
    }
}
