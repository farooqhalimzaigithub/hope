<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
           $table->increments('id');
             $table->string('name');
             $table->string('lat');
             $table->string('lng');
             $table->string('address');
             $table->string('land_mark');
             $table->string('school_type');
             $table->string('status');
             $table->string('building_ownership');
             $table->string('gender');
             $table->string('building_structure');
             $table->integer('district_id');
             $table->integer('user_id')->unsigned()->nullable();
             // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('schools');
    }
}
