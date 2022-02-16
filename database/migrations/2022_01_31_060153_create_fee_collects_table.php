<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeCollectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_collects', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('student_id')->unsigned()->nullable();
             // $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
             $table->integer('class_section_session_id')->unsigned()->nullable();
             // $table->foreign('class_section_session_id')->references('id')->on('class_section_sessions')->onDelete('cascade')->onUpdate('cascade');
             $table->integer('fee_id')->unsigned()->nullable();
             // $table->foreign('fee_id')->references('id')->on('fees')->onDelete('cascade')->onUpdate('cascade');
              $table->decimal('received_amount', 10, 2)->nullable();
              $table->decimal('discount', 10, 2)->nullable();
              $table->decimal('balance', 10, 2)->nullable();
              $table->decimal('advance_payment', 10, 2)->nullable();
              $table->decimal('total', 10, 2)->nullable();
              $table->tinyInteger('status')->default('0');
               $table->dateTime('received_date')->nullable();
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
        Schema::dropIfExists('fee_collects');
    }
}
