<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_costs', function (Blueprint $table) {
            $table->id();
            $table->string('receive_date');
            $table->integer('cost_type');
            $table->integer('supplier_id');
            $table->integer('cf_agent')->nullable();
            $table->string('shipping_port')->nullable();
            $table->integer('destination_id')->nullable();
            $table->integer('lc_number')->nullable();
            $table->string('lc_date')->nullable();
            $table->integer('lc_amount')->nullable();
            $table->integer('bank_id');
            $table->string('container_receive');
            $table->string('gw_po');
            $table->string('supplier_invoice');
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
        Schema::dropIfExists('local_costs');
    }
}
