<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoLanguageGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('no_language_games', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->longText('iframe');
            $table->longText('description')->nullable();
            $table->longText('instruction')->nullable();
            $table->boolean('mostPlayed')->nullable();
            $table->boolean('topRated')->nullable();
            $table->json('tags_ids');
            $table->json('uniqueIds');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('no_language_games');
    }
}
