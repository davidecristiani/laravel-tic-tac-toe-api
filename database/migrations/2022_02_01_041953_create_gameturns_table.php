<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gameturns', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('game_id');
            $table->unsignedSmallInteger('player')->default(0);
            $table->unsignedSmallInteger('a1')->default(0);
            $table->unsignedSmallInteger('a2')->default(0);
            $table->unsignedSmallInteger('a3')->default(0);
            $table->unsignedSmallInteger('b1')->default(0);
            $table->unsignedSmallInteger('b2')->default(0);
            $table->unsignedSmallInteger('b3')->default(0);
            $table->unsignedSmallInteger('c1')->default(0);
            $table->unsignedSmallInteger('c2')->default(0);
            $table->unsignedSmallInteger('c3')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gameturns');
    }
}
