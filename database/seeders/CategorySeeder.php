<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder {
    public function run(): void {
        if (env('CATEGORIES_TO_SEED',0) > 0) Category::factory(env('CATEGORIES_TO_SEED'))->create();
    }
}