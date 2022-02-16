<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (Blueprint $table) {
             $table->increments('id');
               $table->string('account_name');
               $table->string('account_no')->nullable();
               $table->integer('exam_type_id')->unsigned()->nullable();
               // $table->foreign('exam_type_id')->references('id')->on('exam_types')->onDelete('cascade')->onUpdate('cascade');
               $table->dateTime('from_date')->nullable();
               $table->dateTime('to_date')->nullable();
               $table->dateTime('result_date')->nullable();
               $table->integer('grade_id')->unsigned()->nullable();
               // $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('examinations');
    }
}
