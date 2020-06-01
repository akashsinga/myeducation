<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->string('dept');
            $table->string('year');
            $table->string('section');
            $table->string('sub_code');
            $table->string('faculty_id');
            $table->int('students_present');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
}
// ID: primary
// Department: string
// Year: string
// Section: string
// Subject code: string
// Faculty ID: string
