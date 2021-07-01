<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('product_sku',255)->nullable();
            $table->string('product_name',255);
            $table->string('product_color',100)->nullable();
            $table->mediumText('product_desc')->nullable();
            $table->integer('product_qnty')->nullable();
            $table->double('product_cp',20,2)->nullable();
            $table->double('product_sp',20,2)->nullable();
            $table->timestamps();
            $table->integer('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
