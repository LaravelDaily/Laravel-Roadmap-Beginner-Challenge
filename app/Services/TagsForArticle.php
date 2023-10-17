<?php

namespace App\Services;

class TagsForArticle {
    /*
        This returns an array whose values are the id#'s of the selected tags, if any.
        Used in ArticleController, inside the store() and update() methods.
    */
    public static function fetchTagsFromRequest(): array {
        $tagCollection = request()->collect();
        $tagCollection->pull('_token');
        $tagCollection->pull('_method');
        $tagCollection->pull('category_id');
        $tagCollection->pull('title');
        $tagCollection->pull('fulltext');
        $tagCollection->pull('image');
        $tagCollection->pull('image_confirmation');
        return $tagCollection->values()->toArray();
    }
}