<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\ArticleGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArticleGroupLink>
 */
class ArticleGroupLinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'article_id' =>  Article::inRandomOrder()->limit(1)->get()[0]->id,
            'article_group_id' =>  ArticleGroup::inRandomOrder()->limit(1)->get()[0]->id,
        ];
    }
}
