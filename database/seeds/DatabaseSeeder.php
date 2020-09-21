<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call([
            AmbassadorSeeder::class,
            ClientSeeder::class,
            SalarySeeder::class,
            EmployeeSeeder::class,
            LoanSeeder::class,
            GuarantorSeeder::class
            ]);
    }
}
