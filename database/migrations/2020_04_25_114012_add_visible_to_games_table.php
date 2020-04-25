<?php

use App\Models\Game;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVisibleToGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->boolean('visible')->default(1);
        });

        $games = Game::all();
        foreach ($games as $game) {
            if ($game->iframeError === 1 || $game->deleted_at !== null) {
                $game->update([
                    'visible' => 0,
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn('visible');
        });

        $games = Game::all();
        foreach ($games as $game) {
            $game->update([
                'visible' => 1,
            ]);
        }
    }
}
