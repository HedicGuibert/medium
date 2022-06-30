<?php

namespace Database\Seeders;

use App\Models\ArticleGroupLink;
use Illuminate\Database\Seeder;

class ArticleGroupLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleGroupLink::factory()->count(10)->create();
    }
}
