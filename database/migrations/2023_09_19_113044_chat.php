<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('mensage')->nullable();
            $table->string('dice')->nullable();
            $table->unsignedInteger('id_room');
            $table->foreign('id_room')->references('id')->on('rooms');
            $table->unsignedInteger('id_player');
            $table->foreign('id_player')->references('id')->on('users');
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
