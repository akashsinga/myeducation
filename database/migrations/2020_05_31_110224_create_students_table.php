<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->string('admission_no');
            $table->string('roll_no');
            $table->string('full_name');
            $table->string('father_name');
            $table->string('mobile');
            $table->string('email');
            $table->longText('address');
            $table->string('password');
            $table->string('CGPA');
            $table->string('SGPA');
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
        Schema::dropIfExists('students');
    }
}
