<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassSectionSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('class_section_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_id')->unsigned()->index();
             // $table->foreign('class_id')->references('class_id')->on('free_classes')->onDelete('cascade')->onUpdate('cascade');

             $table->integer('section_id')->unsigned()->nullable();
             // $table->foreign('section_id')->references('section_id')->on('sections')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('branch_id')->unsigned()->nullable();
             // $table->foreign('branch_id')->references('branch_id')->on('branches')->onDelete('cascade')->onUpdate('cascade');

             $table->integer('session_id')->unsigned()->index();
             // $table->foreign('session_id')->references('session_id')->on('sessions')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('class_section_sessions');
    }
}
