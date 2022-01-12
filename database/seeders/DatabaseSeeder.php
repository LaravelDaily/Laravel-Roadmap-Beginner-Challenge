<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => '$2y$10$5TZ/jmmfze/.4O8XN5Wi9u2w/HtsqYdP/uoYfbPKHb6fDq8k.hNe2',  // password
        ]);

        $user2 = User::factory()->create([
            'email' => 'amar@admin.com',
            'password' => '$2y$10$5TZ/jmmfze/.4O8XN5Wi9u2w/HtsqYdP/uoYfbPKHb6fDq8k.hNe2',  // password
        ]);

        \App\Models\Post::factory(10)->create([
            'user_id' => $user->id,
        ]);
    }
}
