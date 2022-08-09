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
            $table->text('description');
            $table->date('date');
            $table->string('map_path')->nullable();

            $table->boolean('finished')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
};
