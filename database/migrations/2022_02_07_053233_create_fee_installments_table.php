<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_installments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_fee_id')->unsigned()->nullable();
             // $table->foreign('student_fee_id')->references('session_id')->on('student_fees')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('session_id')->unsigned()->nullable();
             // $table->foreign('session_id')->references('session_id')->on('sessions')->onDelete('cascade')->onUpdate('cascade');
              $table->integer('class_section_session_id')->unsigned()->nullable();
             // $table->foreign('class_section_session_id')->references('id')->on('class_section_sessions')->onDelete('cascade')->onUpdate('cascade');
             $table->date('month')->nullable();
             $table->integer('student_id')->unsigned()->nullable();
             // $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
              $table->decimal('amount', 10, 2)->nullable();
              $table->decimal('received_amount', 10, 2)->nullable();
              // $table->integer('clear')->default('0');
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
        Schema::dropIfExists('fee_installments');
    }
}
