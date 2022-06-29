<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ArticleTest extends AbstractBaseTest
{
     protected function setUp(): void
    {
        parent::setUp();
        $this->generateUsers();
        $this->generateArticles();
    }

    public function test_user_can_not_see_list_article_without_login() {
      $this->browse(function (Browser $browser) {
        $browser->visit('/admin/articles')
                ->assertSee('login');
      });

    }

    // public function test_edituser_can_now_see_list_article_after_login() {
    //   $this->browse(function (Browser $browser) {
    //     $browser->loginAs($this->editorUser)
    //             ->visit('/admin/articles')
    //             ->scrollIntoView('')
    //             ->assertSeeIn('@articleSlug', 'article-1');
      
    //   });
    // }

    //Les testes suivantes éditeur ont déjà connectés
    // public function test_edituser_can_add_new_article(){
    //   $this->browse(function (Browser $browser) {
    //     $browser->loginAs($this->getEditorUser())
    //             ->visit('/admin/article/create')
    //             ->type('title', 'This is a new title')
    //             ->type('introduction', "This is a new introduction for this test specification")
    //             // ->value('selector', "category 1")
    //             // ->value('selector', "category 3")
    //             ->press('@submit-create')
    //             ->visit("/admin/articles")
    //             ->assertSeeIn("@title", "this is a new title");
    //   });
    // }
}

