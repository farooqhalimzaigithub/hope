<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_infos', function (Blueprint $table) {
           $table->increments('id');
             $table->integer('staff_id')->unsigned()->nullable();
             // $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade')->onUpdate('cascade');
            // professional info
             $table->text('prof_description')->nullable();
             $table->string('prof_roll_no')->nullable();
             $table->string('prof_year')->nullable();
             $table->integer('prof_total_mark')->nullable();
             $table->integer('prof_obtain_mark')->nullable();
             $table->string('prof_percentage')->nullable();
             $table->string('prof_board')->nullable();
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
        Schema::dropIfExists('professional_infos');
    }
}
