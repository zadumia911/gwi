<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_details', function (Blueprint $table) {
            $table->id();
            $table->integer('import_id');
            $table->string('hs')->length('55');
            $table->integer('item_id');
            $table->string('duty_assign')->length('100');
            $table->string('duty_p')->length('100');
            $table->string('cost_price')->length('55');
            $table->string('sale_price')->length('55');
            $table->integer('quantity');
            $table->string('cartoon')->length('99');
            $table->string('currency')->length('55');
            $table->string('pack')->length('155');
            $table->string('size')->length('155');
            $table->string('ppp')->length('155');
            $table->string('margin')->length('50');
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
        Schema::dropIfExists('import_details');
    }
}
