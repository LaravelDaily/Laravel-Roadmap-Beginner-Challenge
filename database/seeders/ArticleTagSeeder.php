<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Tag;

class ArticleTagSeeder extends Seeder {
    public function run(): void {
        $qty_tags = Tag::count();
        if ($qty_tags === 0) return;
        foreach (Article::all() as $article) {
            $qty = rand(env('MIN_TAGS_PER_ARTICLE_TO_SEED',0), min(env('MAX_TAGS_PER_ARTICLE_TO_SEED',5), $qty_tags));
            if ($qty > 0) $article->tags()->attach(Tag::orderByRaw('rand()')->limit($qty)->get()->pluck('id'));
        }
    }
}