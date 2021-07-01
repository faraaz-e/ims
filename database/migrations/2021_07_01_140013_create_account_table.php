<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->string('my_firstname', 255)->nullable();
            $table->string('my_lastname', 255)->nullable();
            $table->string('my_shop_street', 255)->nullable();
            $table->string('my_town_city', 255)->nullable();
            $table->string('my_pincode', 255)->nullable();
            $table->string('my_contact1', 255)->nullable();
            $table->string('my_contact2', 255)->nullable();
            $table->string('my_email', 255)->nullable();
            $table->string('my_gst', 255)->nullable();
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
        Schema::dropIfExists('account');
    }
}
