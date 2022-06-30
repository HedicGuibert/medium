<?php

namespace Tests\Browser;

use App\Models\Article;
use App\Models\ArticleGroup;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Tests\DuskTestCase;

abstract class AbstractBaseTest extends DuskTestCase
{
    use DatabaseMigrations;

    private ?User $simpleUser = null;

    private ?User $authorUser = null;

    private ?User $editorUser = null;


    protected function getSimpleUser(): User
    {
        if (!$this->simpleUser) {
            $this->simpleUser = User::factory()->create([
                'name' => 'Simple User',
                'password' => Hash::make('simpleuser'),
                'email' => 'user@fixture.com',
                'role' => User::ROLE_USER,
            ]);
        }

        return $this->simpleUser;
    }

    protected function getAuthorUser(): User
    {
        if (!$this->authorUser) {
            $this->authorUser = User::factory()->create([
                'name' => 'Author User',
                'password' => Hash::make('authoruser'),
                'email' => 'author@fixture.com',
                'role' => User::ROLE_AUTHOR,
            ]);
        }

        return $this->authorUser;
    }

    protected function getEditorUser(): User
    {
        if (!$this->editorUser) {
            $this->editorUser = User::factory()->create([
                'name' => 'Editor User',
                'password' => Hash::make('editoruser'),
                'email' => 'editor@fixture.com',
                'role' => User::ROLE_EDITOR,
            ]);
        }

        return $this->editorUser;
    }

    protected function generateArticles()
    {
        $this->generateUsers(1);

        Article::factory()->create([
            'title' => 'Article 1',
            'introduction' => 'Introduction 1',
            'body' => 'Text body 1',
            'like' => 0,
            'slug' => 'article-1',
            'user_id' => 1,
        ]);

        Article::factory()->create([
            'title' => 'Article 2',
            'introduction' => 'Introduction 2',
            'body' => 'Text body 2',
            'like' => 0,
            'slug' => 'article_2',
            'user_id' => 1,
        ]);
    }

    protected function generateCategories()
    {
        for ($i = 1; $i < 7; $i++) {
            Category::factory()->create([
                'name' => "Category $i",
                'slug' => "category-$i",
            ]);
        }
    }

    protected function generateArticleGroups()
    {
        for ($i = 1; $i < 6; $i++) {
            ArticleGroup::factory()->create([
                'name' => "Group $i",
                'slug' => "group-$i",
                'user_id' => $this->getEditorUser()
            ]);
        }

        ArticleGroup::factory()->create([
            'name' => "Group $i",
            'slug' => "group-$i",
            'user_id' => $this->getAuthorUser()
        ]);
    }

    // Use this method onyl if you need dummy users that won't have to connect
    // Passwords won't be hashed so users generated won't be able to login but tests will be (a lot) faster
    protected function generateUsers(int $amount = 3)
    {
        User::factory($amount)->create([
            'password' => 'password'
        ]);
    }
}
