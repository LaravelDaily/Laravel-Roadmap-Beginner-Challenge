<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'technology',
            'healty',
            'sport',
            'smart tv',
            'youtube'
        ];

        foreach($tags as $tag){
            Tag::firstOrCreate([
                'name' => $tag,
            ]);
        }
    }
}
