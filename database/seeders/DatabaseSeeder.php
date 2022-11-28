<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory(1)->create(['name' => 'Slawek', 'email' => 'admin@admin.com']); // password
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(TagSeeder::class);
    }
}
