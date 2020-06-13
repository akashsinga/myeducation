<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Model;
use App\Models\Classroom;

$factory->define(Classroom::class, function (Faker $faker) {
    return [
        'department'=>$faker->numberBetween(1,50),
        'year'=>$faker->numberBetween(1,10),
        'section'=>$faker->randomLetter,
        'class_teacher'=>$faker->unique()->numberBetween(1,100)
    ];
});
