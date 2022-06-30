<?php

namespace Database\Seeders;

use App\Models\FavouriteArticles;
use Illuminate\Database\Seeder;

class FavouriteArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FavouriteArticles::factory(10)->create();
    }
}
