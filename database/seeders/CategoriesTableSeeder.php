<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('categories')->delete();

        \DB::table('categories')->insert(array(
            0 =>
            array(
                'id' => 1,
                'title' => 'holidays',
                'created_at' => '2021-10-11 16:37:40',
                'updated_at' => '2021-10-11 16:37:40',
            ),
            1 =>
            array(
                'id' => 2,
                'title' => 'christmas',
                'created_at' => '2021-10-11 16:37:43',
                'updated_at' => '2021-10-11 16:37:43',
            ),
            2 =>
            array(
                'id' => 3,
                'title' => 'art',
                'created_at' => '2021-10-11 16:37:45',
                'updated_at' => '2021-10-11 16:37:45',
            ),
            3 =>
            array(
                'id' => 4,
                'title' => 'animals',
                'created_at' => '2021-10-11 16:37:48',
                'updated_at' => '2021-10-11 16:37:48',
            ),
            4 =>
            array(
                'id' => 5,
                'title' => 'architecture',
                'created_at' => '2021-10-11 16:37:52',
                'updated_at' => '2021-10-11 16:37:52',
            ),
            5 =>
            array(
                'id' => 6,
                'title' => 'design',
                'created_at' => '2021-10-11 16:37:58',
                'updated_at' => '2021-10-11 16:37:58',
            ),
            6 =>
            array(
                'id' => 7,
                'title' => 'diy and crafts',
                'created_at' => '2021-10-11 16:38:01',
                'updated_at' => '2021-10-11 16:38:01',
            ),
            7 =>
            array(
                'id' => 8,
                'title' => 'beauty',
                'created_at' => '2021-10-11 16:38:05',
                'updated_at' => '2021-10-11 16:38:05',
            ),
            8 =>
            array(
                'id' => 9,
                'title' => 'event planning',
                'created_at' => '2021-10-11 16:38:08',
                'updated_at' => '2021-10-11 16:38:08',
            ),
            9 =>
            array(
                'id' => 10,
                'title' => 'food and drink',
                'created_at' => '2021-10-11 16:38:14',
                'updated_at' => '2021-10-11 16:38:14',
            ),
            10 =>
            array(
                'id' => 11,
                'title' => 'men\'s fashion',
                'created_at' => '2021-10-11 16:38:20',
                'updated_at' => '2021-10-11 16:38:20',
            ),
            11 =>
            array(
                'id' => 12,
                'title' => 'home decor',
                'created_at' => '2021-10-11 16:38:24',
                'updated_at' => '2021-10-11 16:38:24',
            ),
            12 =>
            array(
                'id' => 13,
                'title' => 'lawn and garden',
                'created_at' => '2021-10-11 16:38:28',
                'updated_at' => '2021-10-11 16:38:28',
            ),
            13 =>
            array(
                'id' => 14,
                'title' => 'quotes',
                'created_at' => '2021-10-11 16:38:30',
                'updated_at' => '2021-10-11 16:38:30',
            ),
            14 =>
            array(
                'id' => 15,
                'title' => 'travel',
                'created_at' => '2021-10-11 16:38:33',
                'updated_at' => '2021-10-11 16:38:33',
            ),
            15 =>
            array(
                'id' => 16,
                'title' => 'weddings',
                'created_at' => '2021-10-11 16:38:34',
                'updated_at' => '2021-10-11 16:38:34',
            ),
            16 =>
            array(
                'id' => 17,
                'title' => 'women\'s fashion',
                'created_at' => '2021-10-11 16:38:41',
                'updated_at' => '2021-10-11 16:38:41',
            ),
        ));
    }
}
