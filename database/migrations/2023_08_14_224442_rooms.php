<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class rooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('room_name', 80);
            $table->string('bg',20);
            $table->string('code',80);
            $table->unsignedInteger('id_gm');
            $table->foreign('id_gm')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}