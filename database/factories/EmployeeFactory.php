<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        //
        'first_name' => $faker->firstName,
        'middle_name'=>$faker->lastName,
        'last_name'=>$faker->lastName,
        'email' =>$faker->safeEmail,
        // 'address' =>$faker->address,
        'gender'=>$faker->randomElement($array = array ('male', 'female')),
        'birth_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'phone_number' =>$faker->phoneNumber,
        // 'location' =>$faker->company
        'employed_date'=>$faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
