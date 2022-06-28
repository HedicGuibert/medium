<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Simple User',
            'password' => 'simpleuser',
            'email' => 'user@fixture.com',
            'role' => User::ROLE_USER,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Author User',
            'password' => 'authoruser',
            'email' => 'author@fixture.com',
            'role' => User::ROLE_AUTHOR,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Editor User',
            'password' => 'editoruser',
            'email' => 'editor@fixture.com',
            'role' => User::ROLE_EDITOR,
        ]);
    }
}
