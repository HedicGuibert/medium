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

    public function testCategoriesListWorks()
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

    public function testCategoriesListPaginationWorks()
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

    public function testCategoryDeleteWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/categories')
                ->type('@email', $this->simpleUser->email)
                ->type('@password', 'simpleuser')
                ->press('@submit')
                ->assertRouteIs('categories.index')
                ->press('@delete-category-1')
                ->assertRouteIs('categories.index')
                ->assertDontSeeIn('@categoryList', 'Category 1')
                ->logout();
        });
    }

    public function testCategoryCreateWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/categories')
                ->type('@email', $this->simpleUser->email)
                ->type('@password', 'simpleuser')
                ->press('@submit')
                ->type('@create-category-name', 'Test')
                ->press('@create-category-submit')
                ->assertRouteIs('categories.index')
                ->scrollIntoView('a.page-link[rel="next"]')
                ->click('a.page-link[rel="next"]')
                ->assertSeeIn('@categoryList', 'Test')
                ->logout();
        });
    }

    public function testCategoryCreateSecurityWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/categories')
                ->type('@email', $this->simpleUser->email)
                ->type('@password', 'simpleuser')
                ->press('@submit')
                ->type('@create-category-name', 'Category 1')
                ->press('@create-category-submit')
                ->assertRouteIs('categories.index')
                ->assertSee('Action non exécutée.')
                ->logout();
        });
    }
}
