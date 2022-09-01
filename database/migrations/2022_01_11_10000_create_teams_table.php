<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id()->from(1001);
            $table->string('name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('teams');
    }
};
