<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ambassador;
use Faker\Generator as Faker;

$factory->define(Ambassador::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' =>$faker->address,
        'email' =>$faker->safeEmail,
        'gender'=>$faker->randomElement($array = array ('male', 'female')),
        'phone_number' =>$faker->phoneNumber,
        'location' =>$faker->company
        // 'amount' =>$faker->randomNumber
    ];
});
