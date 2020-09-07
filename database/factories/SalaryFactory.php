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
        'salary'=>$faker->randomNumber,
        'bank_name' =>$faker->company,
        'account_no'=>$faker->randomNumber,
        'holder_name'=>$faker->name,
        'tax_reduction'=>$faker->randomDigit
       

    ];
});
