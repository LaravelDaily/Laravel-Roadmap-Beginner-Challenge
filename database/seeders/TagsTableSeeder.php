<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('tags')->delete();

        \DB::table('tags')->insert(array(
            0 =>
            array(
                'id' => 1,
                'title' => 'events',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            1 =>
            array(
                'id' => 2,
                'title' => 'decorations',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            2 =>
            array(
                'id' => 3,
                'title' => 'celebrations',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            3 =>
            array(
                'id' => 4,
                'title' => 'festive decor',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            4 =>
            array(
                'id' => 5,
                'title' => 'recipes',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            5 =>
            array(
                'id' => 6,
                'title' => 'diy ideas',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            6 =>
            array(
                'id' => 7,
                'title' => 'party planning',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            7 =>
            array(
                'id' => 8,
                'title' => 'tips',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            8 =>
            array(
                'id' => 9,
                'title' => 'how-to guides',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            9 =>
            array(
                'id' => 10,
                'title' => 'inspiration',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            10 =>
            array(
                'id' => 11,
                'title' => 'techniques',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            11 =>
            array(
                'id' => 12,
                'title' => 'pets',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            12 =>
            array(
                'id' => 13,
                'title' => 'memes',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            13 =>
            array(
                'id' => 14,
                'title' => 'baby animals',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            14 =>
            array(
                'id' => 15,
                'title' => 'modern homes',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            15 =>
            array(
                'id' => 16,
                'title' => 'urban spaces',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            16 =>
            array(
                'id' => 17,
                'title' => 'classic buildings',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            17 =>
            array(
                'id' => 18,
                'title' => 'packaging',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            18 =>
            array(
                'id' => 19,
                'title' => 'book design',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            19 =>
            array(
                'id' => 20,
                'title' => 'lettering',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            20 =>
            array(
                'id' => 21,
                'title' => 'typography',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            21 =>
            array(
                'id' => 22,
                'title' => 'projects',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            22 =>
            array(
                'id' => 23,
                'title' => 'instructions',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            23 =>
            array(
                'id' => 24,
                'title' => 'patterns',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            24 =>
            array(
                'id' => 25,
                'title' => 'hair',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            25 =>
            array(
                'id' => 26,
                'title' => 'skin',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            26 =>
            array(
                'id' => 27,
                'title' => 'nails',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            27 =>
            array(
                'id' => 28,
                'title' => 'makeup',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            28 =>
            array(
                'id' => 29,
                'title' => 'menus',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            29 =>
            array(
                'id' => 30,
                'title' => 'party favors',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            30 =>
            array(
                'id' => 31,
                'title' => 'table settings',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            31 =>
            array(
                'id' => 32,
                'title' => 'recipes',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            32 =>
            array(
                'id' => 33,
                'title' => 'snacks',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            33 =>
            array(
                'id' => 34,
                'title' => 'meals',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            34 =>
            array(
                'id' => 35,
                'title' => 'prep',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            35 =>
            array(
                'id' => 36,
                'title' => 'men casual looks',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            36 =>
            array(
                'id' => 37,
                'title' => 'formal outfits',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            37 =>
            array(
                'id' => 38,
                'title' => 'accessories',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            38 =>
            array(
                'id' => 39,
                'title' => 'sneakers',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            39 =>
            array(
                'id' => 40,
                'title' => 'home popular styles',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            40 =>
            array(
                'id' => 41,
                'title' => 'furniture',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            41 =>
            array(
                'id' => 42,
                'title' => 'decorating',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            42 =>
            array(
                'id' => 43,
                'title' => 'landscaping',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            43 =>
            array(
                'id' => 44,
                'title' => 'planting',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            44 =>
            array(
                'id' => 45,
                'title' => 'flowers',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            45 =>
            array(
                'id' => 46,
                'title' => 'humor',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            46 =>
            array(
                'id' => 47,
                'title' => 'mindfulness',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            47 =>
            array(
                'id' => 48,
                'title' => 'love',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            48 =>
            array(
                'id' => 49,
                'title' => 'cities',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            49 =>
            array(
                'id' => 50,
                'title' => 'beaches',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            50 =>
            array(
                'id' => 51,
                'title' => 'traveler tips',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            51 =>
            array(
                'id' => 52,
                'title' => 'bucket lists',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            52 =>
            array(
                'id' => 53,
                'title' => 'venues',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            53 =>
            array(
                'id' => 54,
                'title' => 'outfits',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            54 =>
            array(
                'id' => 55,
                'title' => 'invitations',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            55 =>
            array(
                'id' => 56,
                'title' => 'women casual looks',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            56 =>
            array(
                'id' => 57,
                'title' => 'formal outfits',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            57 =>
            array(
                'id' => 58,
                'title' => 'capsule wardrobes',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
            58 =>
            array(
                'id' => 59,
                'title' => 'cozy footwear',
                'created_at' => '2021-10-11 16:06:13',
                'updated_at' => '2021-10-11 16:06:13',
            ),
        ));
    }
}
