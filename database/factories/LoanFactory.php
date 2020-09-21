<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Loan;
use Faker\Generator as Faker;

$factory->define(Loan::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->Name,
        'salary'=>$faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = NULL),
        'amount_borowed'=>$faker->randomNumber,
        'quarantor'=>$faker->Name,
        'payment_method'=>$faker->monthName($max = 'now'),
        'deduction'=>$faker->randomNumber,
        'amount_paid'=>$faker->randomNumber($nbDigits = NULL, $strict = false),
        'loan_balance'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL) 
    ];
});
