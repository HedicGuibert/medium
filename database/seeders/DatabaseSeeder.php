<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        // Order is very important : most dependant models last, least dependant ones first.
        $this->call([
            UserSeeder::class,
            ArticleSeeder::class,
        ]);
=======
        \App\Models\User::factory(2)->create();
        \App\Models\Article::factory(10)->create();
        \App\Models\Comment::factory(20)->create();
>>>>>>> 0a882cf (Add Comment model,migration,factory,seeder)
    }
}
