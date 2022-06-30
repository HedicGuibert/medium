<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;

class CategoryTest extends AbstractBaseTest
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->generateCategories();
    }

    public function testCategoriesListWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->getEditorUser())
                ->visit('/categories')
                ->assertSee('Category 1')
                ->assertSee('Category 2');
        });
    }

    public function testCategoriesListPaginationWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->getEditorUser())
                ->visit('/categories')
                ->scrollIntoView('a.page-link[rel="next"]')
                ->click('a.page-link[rel="next"]')
                ->assertRouteIs('categories.index')
                ->assertSee('Category 6');
        });
    }

    public function testCategoryDeleteWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->getEditorUser())
                ->visit('/categories')
                ->clickAndWaitForReload('@delete-category-1')
                ->assertRouteIs('categories.index')
                ->assertDontSeeIn('@categoryList', 'Category 1');
        });
    }

    public function testCategoryCreateWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->getEditorUser())
                ->visit('/categories')
                ->type('@create-category-name', 'Test')
                ->press('@create-category-submit')
                ->assertRouteIs('categories.index')
                ->scrollIntoView('a.page-link[rel="next"]')
                ->click('a.page-link[rel="next"]')
                ->assertSeeIn('@categoryList', 'Test');
        });
    }

    public function testCategoryCreateSecurityWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->getEditorUser())
                ->visit('/categories')
                ->type('@create-category-name', 'Category 1')
                ->press('@create-category-submit')
                ->assertRouteIs('categories.index')
                ->assertSee('Action non exécutée.');
        });
    }

    public function testCategoryUpdateWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->getEditorUser())
                ->visit('/categories')
                ->press('@update-category-1')
                ->waitFor('@update-category-name', 1)
                ->type('@update-category-name', 'Test')
                ->press('@update-category-submit')
                ->assertRouteIs('categories.index')
                ->assertDontSeeIn('@categoryList', 'Category-1')
                ->assertSeeIn('@categoryList', 'Test');
        });
    }

    public function testCategoryUpdateSecurityWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->getEditorUser())
                ->visit('/categories')
                ->press('@update-category-1')
                ->waitFor('@update-category-name', 1)
                ->type('@update-category-name', 'Category 1')
                ->press('@update-category-submit')
                ->assertRouteIs('categories.index')
                ->assertSee('The name has already been taken..');
        });
    }

    public function testCategoryUpdateSecurityWorks2()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->getEditorUser())
                ->visit('/categories')
                ->press('@edit-form-pane')
                ->waitFor('@update-category-name', 1)
                ->type('@update-category-name', 'Category Test')
                ->press('@update-category-submit')
                ->assertRouteIs('categories.index')
                ->assertSee('Choose a category to update.');
        });
    }
}
