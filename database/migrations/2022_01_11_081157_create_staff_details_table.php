<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_details', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('staff_id')->unsigned()->nullable();
             // $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade')->onUpdate('cascade');
            // edu info
             $table->text('edu_description')->nullable();
             $table->string('edu_roll_no')->nullable();
             $table->string('edu_year')->nullable();
             $table->integer('edu_total_mark')->nullable();
             $table->integer('edu_obtain_mark')->nullable();
             $table->string('edu_percentage')->nullable();
             $table->string('edu_board')->nullable();
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
        Schema::dropIfExists('staff_details');
    }
}
