<?php

use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugAndVisibleToTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->boolean('visible')->default(1);
            $table->string('slug');
        });

        $tags = Tag::all();
        foreach ($tags as $tag) {
            $tagSlug = str_replace(' ', '-', strtolower(trim($tag->title)));
            $tag->update([
                'slug' => $tagSlug,
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
        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn('visible');
            $table->dropColumn('slug');
//
        });
    }
}
