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

            $table->string('login');
            $table->string('email');

            $table->string('first_name')->nullable();
            $table->string('second_name')->nullable();

            $table->boolean('isAdmin')->default(0);
            $table->boolean('isActive')->default(1);

            $table->string('password');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
