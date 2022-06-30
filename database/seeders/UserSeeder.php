<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        // Connect using these users if needed
        User::factory()->create([
            'name' => 'Simple User',
            'password' => Hash::make('simpleuser'),
            'email' => 'user@fixture.com',
            'role' => User::ROLE_USER,
        ]);

        User::factory()->create([
            'name' => 'Author User',
            'password' => Hash::make('authoruser'),
            'email' => 'author@fixture.com',
            'role' => User::ROLE_AUTHOR,
        ]);

        User::factory()->create([
            'name' => 'Editor User',
            'password' => Hash::make('editoruser'),
            'email' => 'editor@fixture.com',
            'role' => User::ROLE_EDITOR,
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'password' => Hash::make('adminuser'),
            'email' => 'admin@fixture.com',
            'role' => User::ROLE_ADMIN,
        ]);
    }
}
