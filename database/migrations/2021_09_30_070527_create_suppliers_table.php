<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('supplier_type')->length('10');
            $table->string('supplier_name')->length('100');
            $table->string('supplier_address')->length('200');
            $table->string('supplier_phone')->length('100');
            $table->string('supplier_email')->length('100');
            $table->string('supplier_web')->length('100');
            $table->integer('supplier_balance')->length('50');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('suppliers');
    }
}
