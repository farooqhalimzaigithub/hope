<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->increments('districtId');
             $table->string('districtTitle')->nullable();
             $table->string('bise')->nullable();
             $table->string('district_desc')->nullable();
             $table->string('district_name_other_language')->nullable();
             $table->string('district_headquarter')->nullable();
             $table->text('district_map')->nullable();
             $table->string('district_latitude')->nullable();
             $table->string('district_logitude')->nullable();
             $table->integer('district_weather_id')->nullable();
               $table->tinyInteger('status')->nullable();
               $table->tinyInteger('order')->nullable();
               $table->tinyInteger('created_by')->nullable();
             // ->unsigned()->index();
        /* $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('cascade')->onUpdate('cascade');*/
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
        Schema::dropIfExists('districts');
    }
}
