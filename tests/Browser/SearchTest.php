<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;

class SearchTest extends AbstractBaseTest
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

    public function testValidSearch()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('@search', 'Article 1')
                ->press('@submit')
                ->assertSee('Article 1')
                ->assertDontSee('Article 2');
        });
    }
    public function testEmptySearch()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('@search', 'Article 3')
                ->press('@submit')
                ->assertSee("Aucun article n'a été trouvé");
        });
    }
}
