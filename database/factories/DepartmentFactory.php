<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Model;
use App\Models\Department;

$factory->define(Department::class, function (Faker $faker) {
    return [
        'name'=>$faker->unique()->state,
        'hod'=>$faker->unique()->name
    ];
});
