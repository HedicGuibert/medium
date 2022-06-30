<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FavouriteArticles>
 */
class FavouriteArticlesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $article = $this->faker->unique()->randomElement(
            Article::all()->pluck('id')->toArray()
        );

        $user = $this->faker->randomElement(
            User::all()->pluck('id')->toArray()
        );

        return [
            'article_id' => $article,
            'user_id' => $user,
        ];
    }
}
