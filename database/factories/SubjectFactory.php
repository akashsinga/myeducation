<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Model;
use App\Models\Subject;
$factory->define(Subject::class, function (Faker $faker) {
    return [
        'code'=>'SUB'.$faker->unique()->numberBetween(1,50),
        'name'=>$faker->state,
        'credits'=>$faker->numberBetween(0,3),
        'department'=>$faker->numberBetween(1, 50)
    ];
});
