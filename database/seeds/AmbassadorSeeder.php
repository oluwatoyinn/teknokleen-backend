<?php

use App\Ambassador;
use Illuminate\Database\Seeder;

class AmbassadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Ambassador::class, 10)->create();

    }
}
