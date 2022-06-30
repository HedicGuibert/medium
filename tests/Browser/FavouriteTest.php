<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;

class FavouriteTest extends AbstractBaseTest
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->generateUsers();
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
            $browser->visit('/')
                ->assertNotPresent('.icon-heart2')
                ->visit('/login')
                ->type('@email', $this->simpleUser->email)
                ->type('@password', 'simpleuser')
                ->press('@submit')
                ->visit('/')
                ->assertPresent('.icon-heart2')
                ->logout();
        });
    }

    public function testFavoritesAdd()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/favourite')
                ->type('@email', $this->simpleUser->email)
                ->type('@password', 'simpleuser')
                ->press('@submit')
                ->assertSee("Aucun article n'a été trouvé")
                ->visit('/')
                ->press('@add_to_favorite_article_2')
                ->visit('/favourite')
                ->assertSee('Article 2')
                ->logout();
        });
    }

    public function testFavoritesRemote()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
            ->type('@email', $this->simpleUser->email)
            ->type('@password', 'simpleuser')
            ->press('@submit')
            ->press('@add_to_favorite_article_2')
            ->visit('/favourite')
            ->assertSee("Article 2")
            ->press('@add_to_favorite_article_2')
            ->visit('/favourite')
            ->assertSee("Aucun article n'a été trouvé");
        });
    }
}

