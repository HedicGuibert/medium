<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;

class ArticleGroupTest extends AbstractBaseTest
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->generateArticleGroups();
    }

    public function testArticleGroupsListWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->logout()
                ->loginAs($this->getEditorUser())
                ->visit('/')
                ->click('@article-group-dropdown')
                ->waitFor('@article-group-list')
                ->click('@article-group-list')
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
                ->click('@user-article-group-dropdown')
                ->assertRouteIs('article-groups.index', ['userId' => $this->getEditorUser()->id])
                ->assertDontSee('Group 6')
                ->assertSee('Group 2');
        });
    }

    public function testEditorUserCanDelete()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->assertSee('Group 2')
                ->click('@delete-article-group-group-2')
                ->waitFor('@article-group-dropdown')
                ->assertDontSeeIn('@article-groups-list', 'Group 2');
        });
    }

    public function testAuthUserCanSeeHisArticleGroupsListOnly()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->logout()
                ->loginAs($this->getAuthorUser())
                ->visit('/')
                ->click('@article-group-dropdown')
                ->waitFor('@user-article-group-dropdown')
                ->click('@user-article-group-dropdown')
                ->assertRouteIs('article-groups.index', ['userId' => $this->getAuthorUser()->id])
                ->assertSee('Group 7')
                ->assertDontSee('Group 2');
        });
    }

    public function testAuthUserCantDelete()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->click('@article-group-dropdown')
                ->waitFor('@user-article-group-dropdown')
                ->click('@user-article-group-dropdown')
                ->assertRouteIs('article-groups.index', ['userId' => $this->getAuthorUser()->id])
                ->assertSee('Group 7')
                ->assertDontSeeIn('@article-groups-list', 'Supprimer');
        });
    }
}
