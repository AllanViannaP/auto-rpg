<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Participate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participate', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_room');
            $table->foreign('id_room')->references('id')->on('rooms');
            $table->unsignedInteger('id_player');
            $table->foreign('id_player')->references('id')->on('users');
            $table->string('permission',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
