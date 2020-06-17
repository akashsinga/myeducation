<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesavaliableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leavesavailable', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->bigInteger('available')->unsigned();
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
        Schema::dropIfExists('leavesavaliable');
    }
}
