<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->foreignId('game_id')->constrained('games');
        });
    }


    public function down()
    {
        Schema::dropIfExists('prices');
    }
};
