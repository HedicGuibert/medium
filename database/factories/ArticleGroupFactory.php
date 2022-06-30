<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArticleGroup>
 */
class ArticleGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->word;

        return [
            'name' => $name,
            'user_id' =>  User::where('name', 'Editor User')->first()->id,
            'slug' => Str::slug($name),
        ];
    }
}
