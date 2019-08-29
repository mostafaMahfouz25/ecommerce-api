<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'detail'=>$faker->paragraph,
        'price'=>$faker->numberBetween(100,900),
        'stock'=>$faker->numberBetween(1000,9000),
        'discount'=>$faker->numberBetween(5,30),
        'user_id' => function(){
            return User::all()->random();
        },
    ];
});
