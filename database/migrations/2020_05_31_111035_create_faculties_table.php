<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->string('faculty_id')->unique();
            $table->string('faculty_name');
            $table->longText('faculty_addr');
            $table->string('faculty_qua');
            $table->string('faculty_desig');
            $table->string('faculty_dept_no');
            $table->string('faculty_mobile');
            $table->string('faculty_email');
            $table->string('faculty_password');
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
        Schema::dropIfExists('faculties');
    }
}
