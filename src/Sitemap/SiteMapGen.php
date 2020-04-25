<?php


namespace src\Sitemap;


use App\Models\Game;
use App\Models\Tag;
use Carbon\Carbon;

class SiteMapGen
{
    private $siteMap;

    public function __construct()
    {
    }

    public function handle()
    {
        $this->siteMap = new SiteMap();

        $this->addUniqueRoutes();
        $this->addGames();
        $this->addCategories();

        file_put_contents('public/sitemap.xml', $this->siteMap->build());

        return response($this->siteMap->build(), 200)
            ->header('Content-Type', 'text/xml');
    }

    private function addUniqueRoutes()
    {
        $startOfMonth = Carbon::now()->startOfMonth()->format('c');

        $this->siteMap->add(
            Url::create('/')
                ->lastUpdate($startOfMonth)
                ->frequency('weekly')
                ->priority('1.00')
        );

        $this->siteMap->add(
            Url::create('/contact')
                ->lastUpdate($startOfMonth)
                ->frequency('monthly')
                ->priority('0.7')
        );

        $this->siteMap->add(
            Url::create('/terms')
                ->lastUpdate($startOfMonth)
                ->frequency('yearly')
                ->priority('0.5')
        );

    }

    private function addCategories()
    {
        $tags = Tag::visible()->whereNotNull('slug')->get([
            'slug', 'updated_at'
        ]);

        foreach ($tags as $tag) {
            $this->siteMap->add(
                Url::create("/category/$tag->slug")
                    ->lastUpdate($tag->updated_at->startOfMonth()->format('c'))
                    ->frequency('weekly')
                    ->priority('0.9')
            );
        }
    }

    private function addGames()
    {
        $games = Game::visible()->whereNotNull('slug')->get([
            'slug', 'updated_at'
        ]);

        foreach ($games as $game) {
            $this->siteMap->add(
                Url::create("/game/$game->slug")
                    ->lastUpdate($game->updated_at->startOfMonth()->format('c'))
                    ->frequency('weekly')
                    ->priority('0.9')
            );
        }
    }
}