<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CategoryTest extends AbstractBaseTest
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->generateUsers();
        $this->generateCategories();
    }

    public function testCategoriesList()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/categories')
                ->type('@email', $this->simpleUser->email)
                // We need to hardcode the password because it will be hashed.
                ->type('@password', 'simpleuser')
                ->press('@submit')
                ->assertRouteIs('categories.index')
                ->assertSee('Category 1')
                ->assertSee('Category 2')
                ->logout();
        });
    }

    public function testCategoriesListPagination()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/categories')
                ->type('@email', $this->simpleUser->email)
                ->type('@password', 'simpleuser')
                ->press('@submit')
                ->scrollIntoView('a.page-link[rel="next"]')
                ->click('a.page-link[rel="next"]')
                ->assertRouteIs('categories.index')
                ->assertSee('Category 6')
                ->logout();
        });
    }
}
