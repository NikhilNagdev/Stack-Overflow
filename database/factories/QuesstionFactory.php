<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        //
        'title' => rtrim($faker->sentence(rand(5, 10)), '.'),
        'body'=>$faker->paragraph(rand(3, 7), true),
        'views_count'=>rand(0, 10),
    ];
});
