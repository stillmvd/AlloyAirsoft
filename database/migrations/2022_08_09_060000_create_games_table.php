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
            $table->double('first_cord');
            $table->double('second_cord');
            $table->string('polygon');
            $table->text('info');
            // $table->text('short_description');
            // $table->text('rule')->nullable();
            $table->dateTime('playtime');
            $table->string('levels')->default('0');
            $table->string('tags_icon')->default('0');

            $table->boolean('finished')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
};
