<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('date')->length('20');
            $table->integer('type')->length('11');
            $table->integer('supplier_id')->length('11');
            $table->string('po')->length('55');
            $table->string('lc')->length('55')->nullable();
            $table->string('lc_bank')->length('55')->nullable();
            $table->string('lc_amount')->length('55')->nullable();
            $table->string('lc_date')->length('20')->nullable();
            $table->integer('total_amount')->length('20');
            $table->string('chalan_no')->length('55');
            $table->string('vat')->length('20')->nullable();
            $table->integer('transport')->length('20')->nullable();
            $table->integer('discount')->length('20')->nullable();
            $table->integer('cash_paid')->length('20')->nullable();
            $table->integer('due')->length('20')->nullable();
            $table->string('payment_method')->length('20')->nullable();
            $table->string('bank_id')->length('30')->nullable();
            $table->string('check_num')->length('30')->nullable();
            $table->string('check_amount')->length('20')->nullable();
            $table->string('check_appr_date')->length('20')->nullable();
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
        Schema::dropIfExists('purchases');
    }
}
