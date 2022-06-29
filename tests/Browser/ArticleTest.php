<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ArticleTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

    public function testShowArticle() {
      $this->browse(function (Browser $browser) {
        // $article = Article::factory()->create([
        //   "title"=> 'test title', 
        //   "introduction" => 'test introduction',
        //   "body" => "test content in body",
        //   "slug" => urlencode($article->title),
        //   "image" => "/images/testimage.png"
        // ]);
      });

    }
}
