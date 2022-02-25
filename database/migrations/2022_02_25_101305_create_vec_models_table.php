<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVecModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vec_models', function (Blueprint $table) {
             $table->increments('id');
             $table->string('meeting_place')->nullable();
             $table->dateTime('meeting_date')->nullable();
             $table->string('meeting')->nullable();
             $table->string('agenda')->nullable();
             $table->string('proceeding')->nullable();
             $table->integer('absent_member')->nullable();
             $table->integer('present_member')->nullable();
             $table->string('att_sheet_image')->nullable();
             $table->string('group_image')->nullable();
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
        Schema::dropIfExists('vec_models');
    }
}
