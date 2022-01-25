<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_classes', function (Blueprint $table) {
                $table->increments('id');
               // $table->string('name');
                $table->tinyInteger('status')->default('0')->nullable();
                $table->integer('student_id')->unsigned()->nullable();
                $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
                $table->integer('class_section_section_id')->unsigned()->nullable();
                $table->foreign('class_section_section_id')->references('id')->on('class_section_sessions')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('student_classes');
    }
}
