<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id()->from(1001);
            $table->timestamps();

            $table->date('op-date');
            $table->string('op-name');
            $table->text('card-info');
            $table->time('op-time');
            $table->string('op-polygon');
            $table->double('first-cord');
            $table->double('second-cord');
            $table->text('game-info');
            
            $table->string('levels')->default('0');
            $table->string('tags-icon')->default('0');
            $table->boolean('finished')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
};
