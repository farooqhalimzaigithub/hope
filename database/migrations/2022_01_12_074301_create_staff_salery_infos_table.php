<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffSaleryInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_salery_infos', function (Blueprint $table) {
           $table->increments('id');
             $table->integer('staff_id')->unsigned()->nullable();
             // $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade')->onUpdate('cascade');
             // Finanial info
              $table->decimal('basic_salery', 10, 2)->nullable();
              $table->decimal('class_incharge', 10, 2)->nullable();
              $table->decimal('chief_proctor', 10, 2)->nullable();
              $table->decimal('controller_of_examination', 10, 2)->nullable();
              $table->decimal('debate_incharge', 10, 2)->nullable();
              $table->decimal('sport_incharge', 10, 2)->nullable();
              $table->decimal('account_allowance', 10, 2)->nullable();
              $table->decimal('lab_incharge', 10, 2)->nullable();
              $table->decimal('house_incharge', 10, 2)->nullable();
              $table->decimal('others', 10, 2)->nullable();
              $table->decimal('e_o_b_i', 10, 2)->nullable();
              $table->decimal('income_tax', 10, 2)->nullable();
              $table->decimal('welfare_fund', 10, 2)->nullable();
              $table->decimal('others2', 10, 2)->nullable();
              $table->decimal('total_allowance', 10, 2)->nullable();
              $table->decimal('total_deduction', 10, 2)->nullable();
              $table->decimal('net_salery', 10, 2)->nullable();
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
        Schema::dropIfExists('staff_salery_infos');
    }
}
