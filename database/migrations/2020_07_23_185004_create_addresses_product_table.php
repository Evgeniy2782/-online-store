<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('street');
            $table->string('house');
            $table->string('flat');
            $table->string('floor')->nullable();
            $table->string('entrance')->nullable();
            $table->integer('user_id'); //->unsigned()->nullable();
       //     $table->foreign('user_id')->references('id')
         //                             ->on('users')
         //                             ->onDelete('cascade');
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
        Schema::dropIfExists('addresses');
    }
}
