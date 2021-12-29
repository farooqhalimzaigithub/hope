<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTarrifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_tarrifs', function (Blueprint $table) {
            $table->increments('id');
               $table->string('fee_name');
              $table->decimal('amount', 10, 2);
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
        Schema::dropIfExists('class_tarrifs');
    }
}
