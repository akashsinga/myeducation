<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LeaveApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaveapplications',function(Blueprint $table){
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('q_id')->unsigned();
            $table->foreign('q_id')->references('id')->on('leavesavailable');
            $table->bigInteger('faculty_id')->unsigned();
            $table->foreign('faculty_id')->references('id')->on('management');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('no_of_days');
            $table->string('leave_type');
            $table->string('reason');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
