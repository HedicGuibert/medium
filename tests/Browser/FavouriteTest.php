<?php

namespace Tests\Browser;

use Illuminate\Support\Facades\Auth;
use Laravel\Dusk\Browser;

class FavouriteTest extends AbstractBaseTest
{
    protected function setUp(): void
    {
        parent::setUp();
        Auth::logout();
        $this->generateArticles();
    }

    public function testFavoritesDoesntExist()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertNotPresent('.icon-heart2');
        });
    }
    public function testFavoritesExist()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->getSimpleUser())
                ->visit('/')
                ->screenshot('favs')
                ->assertPresent('.icon-heart2');
        });
    }

    public function testFavoritesAdd()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->getEditorUser())
                ->visit('/favourite')
                ->assertSee("Aucun article n'a été trouvé")
                ->visit('/')
                ->press('@add_to_favorite_article_2')
                ->visit('/favourite')
                ->assertSee('Article 2');
        });
    }

    public function testFavoritesRemote()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->getEditorUser())
                ->visit('/')
                ->press('@add_to_favorite_article_2')
                ->visit('/favourite')
                ->assertSee("Article 2")
                ->press('@add_to_favorite_article_2')
                ->visit('/favourite')
                ->assertSee("Aucun article n'a été trouvé");
        });
    }
}

