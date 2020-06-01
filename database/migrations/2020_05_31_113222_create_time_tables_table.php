<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_tables', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->string('dept');
            $table->string('year');
            $table->string('section');
            $table->string('sub_name');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('class_teacher');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_tables');
    }
}
// ID: Primary
// Department: string
// Year: string
// Section: string
// Subject: string
// Start Time: Date Time
// End Time: Date Time
// Class Teacher: string
