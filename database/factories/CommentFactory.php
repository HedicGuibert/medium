<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $article = Article::all()->first();
        $user = $this->faker->randomElement(User::all());
        $comment = $this->faker->randomElement(Comment::all());
        return [
            'content' => $this->faker->sentence(10),
            "user_id" => $user->id,
            'like' => random_int(0,20),
            'article_id' => $article->id,
            'comment_id' => is_null($comment) ? null : $comment->id,
        ];
    }
}
