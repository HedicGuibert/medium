<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ArticleSeeder;
use Database\Seeders\CommentSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Order is very important : most dependant models last, least dependant ones first.
        $this->call([
            UserSeeder::class,
            ArticleSeeder::class,
            CommentSeeder::class,
            CategorySeeder::class
        ]);
    }
}
