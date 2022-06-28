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

      $user = $this->faker->randomElement(User::all());
        return [
            "title" => $this->faker->sentence(6, true),
            "introduction"=> $this->faker->paragraph(2,true),
            "body"=> $this->faker->text(),
            "like" => $this->faker->randomDigit(),
            "slug" => $this->faker->word(),
            "user_id" => $user->id
        ];
    }
}
