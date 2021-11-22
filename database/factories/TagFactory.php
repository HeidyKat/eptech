<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'slug'=>$faker->unique()->slug,
        'name'=>$faker->unique()->word,
        'description'=>$faker->sentence($nbWords =6, $variableNbWords=true),
    ];
});
