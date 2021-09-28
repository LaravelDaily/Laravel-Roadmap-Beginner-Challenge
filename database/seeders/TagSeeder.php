<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    protected $names = [
        'laravel',
        'flask',
        'vue',
        'react',
        'php',
        'js',
        'python',
        'ps5',
        'nintendo switch',
        'docker',
        'vs code',
        'sublime text',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect($this->names)->each(fn ($name) => Tag::factory()->create(['name' => $name]));
    }
}
