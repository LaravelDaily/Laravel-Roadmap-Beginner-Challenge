<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ArticleService
{
    private $filePath = null;
    public function store(array $data){

        try{
            DB::beginTransaction();
                $r = new \App\Repositories\ArticleRepository();
                //upload image if exist
                if(isset($data['image'])){
                    $this->uploadImage($data['image']);
                }

                //store article
                $dataArticle = [
                    'title'         => $data['title'],
                    'content'       => $data['content'],
                    'image'         => $this->filePath,
                    'category_id'   => $data['category'],
                    'user_id'       => Auth::id(),
                ];
                $article = $r->store($dataArticle);
                //store article tags
                $this->storeArticleTags($data['tags'], $article);
            DB::commit();
            return $article;
        }catch(\Throwable $e){
            DB::rollback();
            Log::error([
                get_class($this) . 'params ' . json_encode($data),
            ]);
            throw new \Exception($e->getMessage());
        }

    }

    public function update(array $data, $article){
        try{
            $r = new \App\Repositories\ArticleRepository();
            //upload image if exist
            if(isset($data['image'])){
                $this->uploadImage($data['image']);
                //unline previouse image
                $this->unlinkImage($article->image);
            }

            //update article
            $dataArticle = [
                'title'         => $data['title'],
                'content'       => $data['content'],
                'image'         => $this->filePath ?? $article->image,
                'category_id'   => $data['category'],
                'user_id'       => Auth::id(),
            ];
            $article = $r->update($dataArticle);
            //delete tags, i don't know how to make sync for this case -_-
            $this->deleteArticleTags($article);
            //store article tags
            $this->storeArticleTags($data['tags'], $article);
        }catch(\Throwable $e){
            DB::rollback();
            Log::error([
                get_class($this) . 'params ' . json_encode($data),
            ]);
            throw new \Exception($e->getMessage());
        }
    }

    public function unlinkImage($filePath){
        if(Storage::exists($filePath)){
            Storage::delete($filePath);
        }
    }

    public function uploadImage($file){
        $s = new \App\Services\FileUploadService();
        $this->filePath = $s->uploadImage($file, 'articles');
    }

    public function storeArticleTags(array $data, $article){
        $r = new \App\Repositories\ArticleTagRepository();
        for($i = 0 ; $i < count($data); $i++){
            $articleTagData = [
                'tag_id'        => $data[$i],
                'article_id'    => $article->id
            ];
            $r->store($articleTagData);
        }
        return true;
    }

    public function deleteArticleTags($article){
        $r = new \App\Repositories\ArticleTagRepository();
        $r->deleteAllArticleTag($article->id);
        return true;
    }

    public function destroy($article){
        //unlink image
        if($article->image) $this->unlinkImage($article->image);

        //destroy article tags
        $r = new \App\Repositories\ArticleTagRepository();
        $r->deleteAllArticleTag($article->id);

        //destroy article
        $r = new \App\Repositories\ArticleRepository();
        $r->destroy($article->id);

        return true;
    }
}
