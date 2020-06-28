<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Guarantor;
use Faker\Generator as Faker;

$factory->define(Guarantor::class, function (Faker $faker) {
    return [
        //
        // 'name' => $faker->name,
        // 'gender'=>$faker->gender,
        // 'passport'=>$faker->passport,
        // 'age'=>$faker->age,
        // 'phone_number' =>$faker->phoneNumber,
        // 'occupation'=>$faker->occupation,
        // 'office_address'=>$faker->officeAddress,
        // 'home_address' =>$faker->homeAddress,
        // 'ambassador_id'=>$faker->ambassador_id
    ];
});
