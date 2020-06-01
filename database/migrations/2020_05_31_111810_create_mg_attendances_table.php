<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMgAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mg_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('dept_name');
            $table->date('attendance');//shouldn't this be longText
            $table->string('attendance_year');
            $table->int('overall_attendance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mg_attendances');
    }
}
// ID: primary
// USER_ID: string
// Dept no: foreign key
// Attendance: date(string)
// Attendance Year: string
// Overall Attendance: int
