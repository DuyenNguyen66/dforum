<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Question::class, function (Faker $faker) {
    $title = rtrim($faker->sentence(rand(5, 10)), ".");
    return [
        'title' => $title,
        'body' => $faker->paragraphs(rand(3, 7), true),
        'slug' => Str::slug($title, '-'),
        'views' => rand(0, 20),
    ];
});