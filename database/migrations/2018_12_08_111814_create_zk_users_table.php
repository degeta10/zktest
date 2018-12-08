<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZkUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zk_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pin');
            $table->string('name');
            $table->string('password');
            $table->string('privilege');
            $table->string('group');
            $table->string('card');
            $table->string('pin2');
            $table->string('tz1');
            $table->string('tz2');
            $table->string('tz3');
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
        Schema::dropIfExists('zk_users');
    }
}
