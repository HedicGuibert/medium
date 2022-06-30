<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CommentTest extends AbstractBaseTest
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
        $this->generateComments();
    }

    public function testCommentDisplayWithoutSession()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Article 2')
                ->click('@navigate_to_article_article_2')
                ->assertSee('Comment 1')
                ->assertSee('Comment 2')
                ->assertDontSee('Response comment 1')
                ->click('@data-accordion_1')
                ->pause(1000)
                ->assertSee('Response comment 1')
                ->assertDontSee('Répondre')
                ->assertDontSee('Modifier')
                ;
        });
    }

    public function testCreateCommentWithoutSession()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Article 2')
                ->click('@navigate_to_article_article_2')
                ->type('@textarea', "Amazing article")
                ->press('@submit_comment_form')
                ->assertUrlIs(route('login'))
                ;
        });
    }
    public function testCreateComment()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->getSimpleUser())
                ->visit('/')
                ->assertSee('Article 2')
                ->click('@navigate_to_article_article_2')
                ->type('@textarea', "Amazing article")
                ->press('@submit_comment_form')
                ->assertSee("Amazing article")
                ->assertSee("Commentaire ajouté !")
                ->logout()
                ;
        });
    }
    public function testModifyComment()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/')
                ->click('@navigate_to_article_article_2')
                ->assertSee('Modifier')
                ->click('@modify_comment_2')
                ->assertAttributeContains("@textarea", "value", "Comment 2")
                ->type('@textarea', "Comment 2 modified !")
                ->press('@submit_comment_form')
                ->assertSee("Commentaire modifié !")
                ->assertSee("Comment 2 modified !")
                ;
        });
    }
}
