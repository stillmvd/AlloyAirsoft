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

            $table->date('date');
            $table->string('name');
            $table->time('time');
            $table->string('polygon');
            $table->string('linkForIframe');
            $table->string('linkForGoogle');

            $table->boolean('finished')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
};
