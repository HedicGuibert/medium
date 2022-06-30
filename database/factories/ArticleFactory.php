<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(6, true),
            'introduction'=> $this->faker->paragraph(2, true),
            'status'=>'published',
            'body'=> $this->faker->text(1000),
            'like' => $this->faker->randomDigit(),
            'slug' => $this->faker->unique()->slug(),
            'user_id' => User::inRandomOrder()->limit(1)->get()[0]->id,
        ];
    }
}
