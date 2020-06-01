<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->string('sub_code');
            $table->string('sub_name');
            $table->string('sub_dept');
            $table->string('sub_year');
            // $table->string('sub_semester');
            $table->int('sub_credits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
// Subject Code
// Subject Name
// Subject Department
// Subject Year and Semester (If)
// Subject Credits
