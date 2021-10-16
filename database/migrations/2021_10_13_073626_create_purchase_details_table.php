<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->integer('purchase_id')->length('11');
            $table->integer('product_id')->length('11');
            $table->string('size')->length('55')->nullable();
            $table->integer('low_stock')->length('11');
            $table->integer('quantity')->length('11');
            $table->integer('hidden_qty')->length('11');
            $table->float('cost_price')->length('11,2');
            $table->float('sale_price')->length('11,2');
            $table->float('total_price')->length('11,2');
            $table->integer('instock')->length('11');
            $table->integer('hidden_instock')->length('11');
            $table->string('expire_date')->length('20');
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
        Schema::dropIfExists('purchase_details');
    }
}
