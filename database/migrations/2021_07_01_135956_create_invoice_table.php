<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number', 255);
            $table->string('invoice_date', 100)->nullable();
            $table->string('my_address', 1000)->nullable();
            $table->string('client_name', 255)->nullable();
            $table->string('client_address', 1000)->nullable();
            $table->string('shipping_address', 1000)->nullable();
            $table->double('subtotal', 20,2)->nullable();
            $table->integer('shipping_cost')->nullable();
            $table->double('grand_total', 20,2)->nullable();
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
        Schema::dropIfExists('invoice');
    }
}
