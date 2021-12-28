<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_details', function (Blueprint $table) {
           $table->increments('id');
               $table->string('postal_address')->nullable();
               $table->string('permanent_address')->nullable();
               $table->string('contact_no')->nullable();
               $table->string('cellular_no')->nullable();
               $table->string('guardian_name')->nullable();
               $table->string('guardian_cnic')->nullable();
               $table->string('gender')->nullable();
               $table->integer('blood_id')->unsigned()->nullable();
             // $table->foreign('blood_id')->references('id')->on('blood_groups')->onDelete('cascade')->onUpdate('cascade');
               $table->string('health_name')->nullable();
               $table->string('waight')->nullable();
               $table->string('height')->nullable();
               $table->string('house_name')->nullable();
               $table->integer('current_class_id')->unsigned()->nullable();
             // $table->foreign('current_class_id')->references('id')->on('levels')->onDelete('cascade')->onUpdate('cascade');
               $table->integer('admission_class_id')->unsigned()->nullable();
             // $table->foreign('admission_class_id')->references('id')->on('levels')->onDelete('cascade')->onUpdate('cascade');
               $table->integer('section_id')->unsigned()->nullable();
             // $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
               $table->integer('city_id')->unsigned()->nullable();
             // $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
                $table->integer('student_id')->unsigned()->nullable();
             // $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
               
               $table->string('guardian_mobile_number')->nullable();
               $table->string('clc_no')->nullable();
               $table->string('remark')->nullable();
               $table->integer('school_id')->unsigned()->nullable();
             // $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('student_details');
    }
}
