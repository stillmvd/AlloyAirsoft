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
            
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->foreignId('game_id')->constrained();

            $table->boolean('isAdmin')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
