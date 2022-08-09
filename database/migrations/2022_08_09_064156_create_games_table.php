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

            $table->string('name');
            $table->string('place');
            $table->text('description');
            $table->foreignId('user_id')->constrained();

            $table->boolean('finished')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
};
