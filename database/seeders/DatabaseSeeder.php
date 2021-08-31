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
        $this->call([
            TagSeeder::class,
            CategorySeeder::class,
            ArticleSeeder::class,
        ]);
        \DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => \Hash::make('password'),
        ]);        
    }
}
