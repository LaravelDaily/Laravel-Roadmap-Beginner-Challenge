<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArticleTagTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('article_tag')->delete();

        \DB::table('article_tag')->insert(array(
            0 =>
            array(
                'article_id' => 1,
                'tag_id' => 38,
            ),
            1 =>
            array(
                'article_id' => 1,
                'tag_id' => 14,
            ),
            2 =>
            array(
                'article_id' => 1,
                'tag_id' => 50,
            ),
            3 =>
            array(
                'article_id' => 2,
                'tag_id' => 38,
            ),
            4 =>
            array(
                'article_id' => 2,
                'tag_id' => 45,
            ),
            5 =>
            array(
                'article_id' => 2,
                'tag_id' => 1,
            ),
            6 =>
            array(
                'article_id' => 2,
                'tag_id' => 6,
            ),
            7 =>
            array(
                'article_id' => 3,
                'tag_id' => 46,
            ),
            8 =>
            array(
                'article_id' => 3,
                'tag_id' => 10,
            ),
            9 =>
            array(
                'article_id' => 3,
                'tag_id' => 23,
            ),
            10 =>
            array(
                'article_id' => 4,
                'tag_id' => 13,
            ),
            11 =>
            array(
                'article_id' => 4,
                'tag_id' => 9,
            ),
            12 =>
            array(
                'article_id' => 4,
                'tag_id' => 23,
            ),
            13 =>
            array(
                'article_id' => 5,
                'tag_id' => 10,
            ),
            14 =>
            array(
                'article_id' => 5,
                'tag_id' => 23,
            ),
            15 =>
            array(
                'article_id' => 5,
                'tag_id' => 55,
            ),
        ));
    }
}
