<?php

namespace Database\Seeders;

use App\Models\ArticleGroup;
use Illuminate\Database\Seeder;

class ArticleGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleGroup::factory()->count(10)->create();
    }
}
