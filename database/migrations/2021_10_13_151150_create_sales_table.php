<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bill')->length('20');
            $table->string('chalan')->length('55')->nullable();
            $table->integer('employee_id')->length('11');
            $table->integer('customer_id')->length('11');
            $table->bigInteger('po')->length('30');
            $table->string('vat_challan')->length('55');
            $table->string('delivery_address')->length('155');
            $table->string('date')->length('55');
            $table->string('delivery_date')->length('55');
            $table->string('work_order')->length('55')->nullable();
            $table->float('total_amount')->length('11','2');
            $table->float('cost_amount')->length('11','2');
            $table->integer('special_discount')->length('11')->nullable();
            $table->float('discount')->length('11','2')->nullable();
            $table->float('discount_p')->length('11','2')->nullable();
            $table->float('vat')->length('11','2')->nullable();
            $table->float('vatt')->length('11','2')->nullable();
            $table->string('sd')->length('50')->nullable();
            $table->string('lab_trans')->length('55')->nullable();
            $table->float('cash_paid')->length('11','2')->nullable();
            $table->integer('transport_id')->length('11')->nullable();
            $table->float('due')->length('11','2');
            $table->string('payment_method')->length('55');
            $table->integer('bank_id')->length('11')->nullable();
            $table->string('check_num')->length('55')->nullable();
            $table->string('check_amount')->length('55')->nullable();
            $table->string('check_appr_date')->length('55')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
