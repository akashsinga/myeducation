<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Model;
use App\Models\Management;
$factory->define(Management::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->numberBetween(2,100),
        'qualification'=>$faker->randomElement(['B.Tech','M.Tech','PHD']),
        'designation'=>$faker->randomElement(['Asst.Professor','Professor']),
        'leaves'=>30,
        'salary'=>$faker->randomElement([50000,60000,70000,25000])
    ];
});
