<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name',255);
            $table->string('client_shop_street', 1000)->nullable();
            $table->string('client_city_town', 1000)->nullable();
            $table->integer('client_pincode')->nullable();
            $table->string('client_desc', 1000)->nullable();
            $table->integer('client_contact1')->nullable();
            $table->integer('client_contact2')->nullable();
            $table->string('client_email', 255)->nullable();
            $table->double('client_total_amt', 20, 2)->nullable();
            $table->double('client_paid_amt', 20, 2)->nullable();
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
        Schema::dropIfExists('clients');
    }
}
