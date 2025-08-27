<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Tag;

class ArticleService
{
    public static function getArticleTagsToString($articleTags)
    {
        $tags = '';

        foreach ($articleTags as $index => $tag) {
            $tags .= $tag->name;
            $tags .= $index == count($articleTags) - 1 ? '' : ',';
        }

        return $tags;
    }

    public static function getNewTagIds($tags)
    {
        $newTagIds = [];
        $tags = explode(',', $tags);

        foreach ($tags as $tag) {
            array_push($newTagIds,  Tag::select('id')->where('name', $tag)->first()->id);
        }

        return $newTagIds;
    }
}
