<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('email', 100);
            // $table->string('account_access');
            $table->enum('gender',['male','female']);
            $table->date('birth_date');
            $table->string('phone_number');
            // $table->text('role');
            $table->date('employed_date');
            $table->enum('confirmation',['confirm','awaiting']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
