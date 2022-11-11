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

            $table->string('email');
            $table->string('password');

            $table->boolean('isActive');
            $table->boolean('isAdmin');
            $table->foreignId('player_id')->constrained('players');
            $table->string('pathToAvatar')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
