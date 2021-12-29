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
               $table->string('name');
                $table->tinyInteger('last_class')->default('0')->nullable();
               $table->integer('enrollment_id')->unsigned()->nullable();
               $table->foreign('enrollment_id')->references('id')->on('enrollment_registers')->onDelete('cascade')->onUpdate('cascade');
              $table->integer('class_id')->unsigned()->nullable();
              $table->foreign('class_id')->references('id')->on('levels')->onDelete('cascade')->onUpdate('cascade');
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
