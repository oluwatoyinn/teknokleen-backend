<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        //
        'company_name' => $faker->company,
        'address' =>$faker->address,
        'state'=>$faker->state,
        'city'=>$faker->city,
        'website'=>$faker->url,
        'email' =>$faker->safeEmail,
        'contact_person'=>$faker->name,
        'contact_no' =>$faker->phoneNumber,
        'contract_value'=>$faker->randomDigit
    ];
});
