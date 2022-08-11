<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->from(1001);
            $table->timestamps();

            $table->foreignId('game_id')->constrained('games');
            $table->string('first_name')->nullable();
            $table->string('second_name')->nullable();
            $table->string('call');
            $table->string('email');
            $table->string('phone');
            $table->foreignId('team_id')->constrained('teams');

        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
