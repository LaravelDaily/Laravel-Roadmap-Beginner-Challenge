<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder {
    public function run(): void {
        if (env('TAGS_TO_SEED',0) > 0) Tag::factory(env('TAGS_TO_SEED'))->create();
    }
}