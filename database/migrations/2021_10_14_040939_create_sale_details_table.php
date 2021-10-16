<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->integer('sale_id')->length('11');
            $table->integer('product_id')->length('11');
            $table->integer('quantity')->length('11');
            $table->integer('hidden_qty')->length('11')->nullable();
            $table->string('item_code')->length('55')->nullable();
            $table->float('sale_price')->length('11','2');
            $table->float('cost_price')->length('11','2');
            $table->float('total_price')->length('11','2');
            $table->float('total_cost')->length('11','2');
            $table->float('instock')->length('11','2');
            $table->float('hidden_instock')->length('11','2');
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
        Schema::dropIfExists('sale_details');
    }
}
