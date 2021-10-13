<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    protected $names = [
        'gaming',
        'programming',
        'techonology',
        'extensions',
        'photography',
        'cryptos',
        'micro services',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect($this->names)->each(fn ($name) => Category::factory()->create(['name' => $name]));
    }
}
