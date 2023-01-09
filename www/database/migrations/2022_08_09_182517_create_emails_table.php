<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id()->from(1001);
            $table->timestamps();
            $table->string('email')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('emails');
    }
};
