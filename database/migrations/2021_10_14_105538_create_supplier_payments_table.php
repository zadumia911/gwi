<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_payments', function (Blueprint $table) {
            $table->id();
             $table->integer('supplier_id');
            $table->integer('previous_balance');
            $table->string('payment_method')->length('55');
            $table->integer('bank_id')->length('11')->nullable();
            $table->integer('bank_amount')->length('11')->nullable();
            $table->integer('check_num')->length('11')->nullable();
            $table->integer('check_amount')->length('11')->nullable();
            $table->string('check_appr_date')->length('11')->nullable();
            $table->integer('paid')->length('11');
            $table->integer('balance')->length('11');
            $table->string('date')->length('50');
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('supplier_payments');
    }
}
