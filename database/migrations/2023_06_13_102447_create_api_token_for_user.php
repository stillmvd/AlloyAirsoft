<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use JetBrains\PhpStorm\NoReturn;

return new class extends Migration
{
    #[NoReturn] public function up()
    {
        $this->createApiTokenForUser();
        $this->createIpForUser();
        die();
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }

    private function createApiTokenForUser()
    {
        Schema::table('users', function ($table) {
            $table->string('api_token', 80)->after('password')
                ->unique()
                ->nullable()
                ->default(null);
        });
    }

    private function createIpForUser()
    {
        Schema::table('users', function ($table) {
            $table->string('ip_address', 80)->after('api_token')
                ->nullable()
                ->default(null);
        });
    }

};
