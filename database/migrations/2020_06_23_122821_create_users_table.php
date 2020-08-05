<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements( 'id');
            $table->string('name')->nullable();
            $table->string('patronymic')->nullable();
            $table->string('surname')->nullable();
            $table->string('pfone')->nullable();
            $table->string('email',64)->unique()-> nullable();
            $table->string('password');
            $table->boolean('active')->default(true);
            $table->string('right')->default('user');
            $table->string('picture')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
