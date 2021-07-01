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
            $table->string('client_name');
            $table->string('client_shop_street');
            $table->string('client_city_town');
            $table->integer('client_pincode');
            $table->integer('client_contact1');
            $table->integer('client_contact2');
            $table->string('client_email');
            $table->double('client_total_amt', 8, 2);
            $table->double('client_paid_amt', 8, 2);
            $table->double('client_pending_amt', 8, 2);
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
        Schema::dropIfExists('clients');
    }
}
