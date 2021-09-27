<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->length('99');
            $table->string('employee_code')->length('50')->nullable();
            $table->string('father_name')->length('99')->nullable();
            $table->string('mother_name')->length('99')->nullable();
            $table->string('address')->length('255')->nullable();
            $table->string('phone')->length('30');
            $table->string('designation')->length('99')->nullable();
            $table->string('department')->length('99')->nullable();
            $table->string('join_date')->length('99')->nullable();
            $table->integer('salary');
            $table->string('image');
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
        Schema::dropIfExists('employees');
    }
}
