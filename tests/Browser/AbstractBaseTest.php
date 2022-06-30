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

    protected User $simpleUser;

    protected User $authorUser;

    protected User $editorUser;

    protected function generateUsers()
    {
        $this->simpleUser = User::factory()->create([
            'name' => 'Simple User',
            'password' => Hash::make('simpleuser'),
            'email' => 'user@fixture.com',
            'role' => User::ROLE_USER,
        ]);

        $this->authorUser = User::factory()->create([
            'name' => 'Author User',
            'password' => Hash::make('authoruser'),
            'email' => 'author@fixture.com',
            'role' => User::ROLE_AUTHOR,
        ]);

        $this->editorUser = User::factory()->create([
            'name' => 'Editor User',
            'password' => Hash::make('editoruser'),
            'email' => 'editor@fixture.com',
            'role' => User::ROLE_EDITOR,
        ]);
    }

    protected function generateArticles()
    {
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
                'user_id' => $this->editorUser->id
            ]);
        }

        ArticleGroup::factory()->create([
            'name' => "Group $i",
            'slug' => "group-$i",
            'user_id' => $this->authorUser->id
        ]);
    }
}
