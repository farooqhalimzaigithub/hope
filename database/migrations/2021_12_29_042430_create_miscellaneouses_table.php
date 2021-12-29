<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiscellaneousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miscellaneouses', function (Blueprint $table) {
               $table->increments('id');
               $table->string('name');
               $table->string('address')->nullable();
               $table->string('cnic_no')->nullable();
               $table->string('phone_no')->nullable();
               $table->string('mobile_no')->nullable();
               $table->decimal('opening_balance', 10, 2)->nullable();
               $table->tinyInteger('status')->default('0')->nullable();//this is use for Dr Or Cr which is define in checkbox
               $table->integer('city_id')->unsigned()->nullable();
               $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('miscellaneouses');
    }
}
