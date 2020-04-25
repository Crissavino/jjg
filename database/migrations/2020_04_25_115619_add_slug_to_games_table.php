<?php

use App\Models\Game;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->string('slug');
        });

        $games = Game::all();
        foreach ($games as $game) {
            $gameSlug = str_replace(' ', '-', strtolower(trim($game->title)));
            $gameSlug = str_replace('&', '', $gameSlug);
            $game->update([
                'slug' => $gameSlug,
            ]);
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
            $table->dropColumn('slug');
        });
    }
}
