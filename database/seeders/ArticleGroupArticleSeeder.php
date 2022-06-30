<?php

namespace Database\Seeders;

use App\Models\ArticleGroupArticle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleGroupArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      ArticleGroupArticle::factory()->count(10)->create();
    }
}
