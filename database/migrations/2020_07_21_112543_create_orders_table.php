<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements( 'id');
            $table->string('user_id');
            $table->integer('status_id')->default(1);
            $table->boolean('paymentOnDelivery')->default(true);
            $table->string('paid')->nullable();
            $table->string('haveToPay')->default(true);;
            $table->integer('summ')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
