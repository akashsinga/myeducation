<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_id');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('emp_name');
            $table->string('password');
            $table->string('user_type');
            //$table->rememberToken();
            $table->timestamps();
        });
    }
//     ID: Primary
// Emp id: string
// Mobile
// Email Address
// Full Name
// Password
// User type: string
// Timestamps


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
