<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_structures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('session_id')->unsigned()->index();
             // $table->foreign('session_id')->references('session_id')->on('sessions')->onDelete('cascade')->onUpdate('cascade');
               // $table->string('fee_name');
            // $table->integer('class_id')->unsigned()->nullable();
            // $table->foreign('class_id')->ref`erences('id')->on('levels')->onDelete('cascade')->onUpdate('cascade');
             $table->integer('class_section_session_id')->unsigned()->index();
             // $table->foreign('class_section_session_id')->references('id')->on('class_section_sessions')->onDelete('cascade')->onUpdate('cascade');
             $table->integer('fee_type_id')->unsigned()->nullable();
              // $table->foreign('fee_type_id')->references('id')->on('fee_categories')->onDelete('cascade')->onUpdate('cascade');
              $table->decimal('amount', 10, 2);
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
        Schema::dropIfExists('fee_structures');
    }
}
