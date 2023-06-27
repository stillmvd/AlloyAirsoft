<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        $this->addIsDelForPlayers();
    }

    public function down()
    {
        //
    }

    private function addIsDelForPlayers(): void
    {
        Schema::table('players', function ($table) {
            $table->boolean('is_del')->after('team_id')
                ->default(false);
        });
    }
};
