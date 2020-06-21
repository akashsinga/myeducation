<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Model;
use App\Models\Student;
$factory->define(Student::class, function (Faker $faker) {
    return [
        'student_id'=>$faker->unique()->numberBetween(185,225),
        'rollnumber'=>'',
        'classroom_id'=>7,
        'score'=>0,
    ];
});
