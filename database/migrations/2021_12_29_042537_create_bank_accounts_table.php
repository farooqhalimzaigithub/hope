<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
               $table->increments('id');
               $table->string('account_name');
               $table->string('account_no')->nullable();
               $table->integer('bank_id')->unsigned()->nullable();
               $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade')->onUpdate('cascade');
               $table->integer('branch_id')->unsigned()->nullable();
               $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
               $table->string('branch_code')->nullable();
               $table->decimal('opening_balance', 10, 2)->nullable();
               $table->tinyInteger('status')->default('0')->nullable();//this is use for Dr Or Cr which is define in checkbox   
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
        Schema::dropIfExists('bank_accounts');
    }
}
