<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Model;
use App\Models\Student;
$factory->define(Student::class, function (Faker $faker) {
    return [
        'student_id'=>$faker->unique()->numberBetween(11,210),
        'rollnumber'=>'',
        'classroom_id'=>$faker->numberBetween(1,4),
        'score'=>0,
    ];
});
