<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id()->from(1001);
            $table->timestamps();

            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('callsign')->nullable();
            $table->string('emailPlayer');
            $table->string('phone')->nullable();
            $table->string('price')->nullable();
            $table->foreignId('team_id')->constrained('teams');
        });
    }

    public function down()
    {
        Schema::dropIfExists('players');
    }
};
