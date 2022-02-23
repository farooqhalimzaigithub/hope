<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status')->nullable();;
            $table->string('attendance')->nullable();//add by f
            // $table->string('month');
            // $table->integer('year');
            $table->date('att_date');
            $table->time('checkin')->nullable();
            $table->time('checkout')->nullable();
            $table->integer('staff_id')->unsigned()->index();
        /* $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('cascade')->onUpdate('cascade');*/
            $table->integer('branch_id')->unsigned()->nullable();
        /*$table->foreign('branch_id')->references('branch_id')->on('branches')->onDelete('cascade')->onUpdate('cascade');*/
       /* $table->integer('user_id')->unsigned()->index();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');*/
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
        Schema::dropIfExists('staff_attendances');
    }
}
