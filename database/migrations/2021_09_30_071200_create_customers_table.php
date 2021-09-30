<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->length('11');
            $table->string('customer_name')->length('100');
            $table->string('customer_address')->length('200');
            $table->string('customer_phone')->length('100');
            $table->string('customer_email')->length('100');
            $table->string('customer_web')->length('100');
            $table->integer('customer_balance')->length('50');
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
        Schema::dropIfExists('customers');
    }
}
