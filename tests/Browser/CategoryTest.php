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
                ->type('@email', $this->editorUser->email)
                // We need to hardcode the password because it will be hashed.
                ->type('@password', 'editoruser')
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
                ->type('@email', $this->editorUser->email)
                ->type('@password', 'editoruser')
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
                ->type('@email', $this->editorUser->email)
                ->type('@password', 'editoruser')
                ->press('@submit')
                ->assertRouteIs('categories.index')
                ->clickAndWaitForReload('@delete-category-1')
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
                ->type('@email', $this->editorUser->email)
                ->type('@password', 'editoruser')
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
                ->type('@email', $this->editorUser->email)
                ->type('@password', 'editoruser')
                ->press('@submit')
                ->type('@create-category-name', 'Category 1')
                ->press('@create-category-submit')
                ->assertRouteIs('categories.index')
                ->assertSee('Action non exécutée.')
                ->logout();
        });
    }

    public function testCategoryUpdateWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/categories')
                ->type('@email', $this->editorUser->email)
                ->type('@password', 'editoruser')
                ->press('@submit')
                ->press('@update-category-1')
                ->type('@update-category-name', 'Test')
                ->press('@update-category-submit')
                ->assertRouteIs('categories.index')
                ->assertDontSeeIn('@categoryList', 'Category-1')
                ->assertSeeIn('@categoryList', 'Test')
                ->logout();
        });
    }

    public function testCategoryUpdateSecurityWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/categories')
                ->type('@email', $this->editorUser->email)
                ->type('@password', 'editoruser')
                ->press('@submit')
                ->press('@update-category-1')
                ->type('@update-category-name', 'Category 1')
                ->press('@update-category-submit')
                ->assertRouteIs('categories.index')
                ->assertSee('The name has already been taken..')
                ->logout();
        });
    }

    public function testCategoryUpdateSecurityWorks2()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/categories')
                ->type('@email', $this->editorUser->email)
                ->type('@password', 'editoruser')
                ->press('@submit')
                ->press('@edit-form-pane')
                ->type('@update-category-name', 'Category Test')
                ->press('@update-category-submit')
                ->assertRouteIs('categories.index')
                ->assertSee('Choose a category to update.')
                ->logout();
        });
    }
}
