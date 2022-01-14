<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
             $table->increments('id');
             $table->string('first_name');
             $table->string('last_name')->nullable();
             $table->string('sur_name')->nullable();
             $table->string('registration_no')->nullable();
             $table->integer('staff_category_id')->unsigned()->nullable();
             // $table->foreign('staff_category_id')->references('id')->on('staff_categories')->onDelete('cascade')->onUpdate('cascade');
             $table->integer('designation_id')->unsigned()->nullable();
             // $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade')->onUpdate('cascade');
             $table->string('cnic_no')->nullable();
             $table->string('gender')->nullable();
             $table->string('marital_status')->nullable();
             $table->integer('city_id')->unsigned()->nullable();
             // $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
             $table->integer('school_id')->unsigned()->nullable();
             // $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade')->onUpdate('cascade');
             $table->integer('campus_id')->unsigned()->nullable();
             // $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade')->onUpdate('cascade');
              $table->tinyInteger('status')->default('0');
             $table->string('address')->nullable();
             $table->string('phone_no')->nullable();
             $table->string('mobile_no')->nullable();
             $table->string('dob')->nullable();
             $table->string('appointment_date')->nullable();
             $table->string('image')->nullable();
             
             


             // $table->integer('religion_id')->unsigned()->nullable();
             // $table->foreign('religion_id')->references('id')->on('religions')->onDelete('cascade')->onUpdate('cascade');
             // $table->integer('cast_id')->unsigned()->nullable();
             // $table->foreign('cast_id')->references('id')->on('casts')->onDelete('cascade')->onUpdate('cascade');
             // $table->integer('province_id')->unsigned()->nullable();
             // $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade')->onUpdate('cascade');
              // $table->integer('country_id')->unsigned()->nullable();
             // $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
             // $table->integer('school_id')->unsigned()->nullable();
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
        Schema::dropIfExists('staff');
    }
}
