<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Salary;
use Faker\Generator as Faker;

$factory->define(Salary::class, function (Faker $faker) {
    return [
        //
        // $table->string('Name');
        //     $table->float('contract_value',9,3);
        //     $table->text('bank_name');
        //     $table->string('account_no');
        //     $table->string('holder_name');
        //     $table->float('tax_reduction',9,3);

        'name' => $faker->Name,
        'level'=>$faker->jobTitle,
        'salary'=>$faker->randomDigit,
        'bank_name' =>$faker->company,
        'account_no'=>$faker->randomNumber,
        'holderName'=>$faker->Name,
        'taxReduction'=>$faker->randomDigit 

    ];
});
