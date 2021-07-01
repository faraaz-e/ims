<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoiceproducts', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id')->nullable();
            $table->string('invoice_number', 255)->nullable();
            $table->integer('product_id')->nullable();
            $table->string('product_sku', 255)->nullable();
            $table->string('product_name', 500)->nullable();
            $table->integer('product_qnty')->nullable();
            $table->double('product_sp', 20, 2)->nullable();
            $table->double('gst_perc', 10, 2)->nullable();
            $table->double('tax_perc', 10, 2)->nullable();
            $table->double('disc_perc', 10, 2)->nullable();
            $table->double('final_price', 20,2)->nullable();
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
        Schema::dropIfExists('invoiceproducts');
    }
}
