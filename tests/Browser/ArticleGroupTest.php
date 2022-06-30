<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ArticleGroupTest extends AbstractBaseTest
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->generateUsers();
        $this->generateArticleGroups();
    }

    public function testArticleGroupsListWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->logout()
                ->loginAs($this->editorUser)
                ->visit('/')
                ->click('@article-group-dropdown')
                ->waitFor('@article-group-list')
                ->click("@article-group-list")
                ->assertRouteIs('article-groups.index')
                ->assertSee('Group 2')
                ->assertDontSee('Group 6');
        });
    }

    public function testArticleGroupsListPaginationWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->scrollIntoView('a.page-link[rel="next"]')
                ->click('a.page-link[rel="next"]')
                ->assertRouteIs('article-groups.index')
                ->assertSee('Group 6');
        });
    }

    public function testUserArticleGroupListWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->click('@article-group-dropdown')
                ->waitFor('@user-article-group-dropdown')
                ->click("@user-article-group-dropdown")
                ->assertRouteIs('article-groups.index', ['userId' => $this->editorUser->id])
                ->assertDontSee('Group 6')
                ->assertSee('Group 2')
                ->logout();
        });
    }
}
