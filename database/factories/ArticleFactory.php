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
            'image' => $this->faker->randomElement(['image-square-1.jpg', 'image-square-2.jpg', 'image-square-3.jpg', 'image-square-4.jpg', 'image-square-5.jpg']),
            'body'=> $this->faker->text(1000),
            'like' => $this->faker->randomDigit(),
            'slug' => $this->faker->unique()->slug(),
            'user_id' => User::inRandomOrder()->limit(1)->get()[0]->id,
        ];
    }
}
