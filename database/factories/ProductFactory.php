<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'codigo'=>$faker->ean8,
        'nombre'=>$faker->streetName,
        'slug'=>$faker->unique()->slug,
        'stock'=>$faker->buildingNumber,
        'short_description'=>$faker->sentence($nbWords =6, $variableNbWords=true),
        'long_description'=>$faker->sentence($nbWords =6, $variableNbWords=true),
        'precio'=>$faker->randomNumber(2),
        'estado'=>'ACTIVE',
        'subcategory_id'=>rand(1,10),
    ];
});
