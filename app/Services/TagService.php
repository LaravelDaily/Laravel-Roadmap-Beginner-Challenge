<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TagService
{
    public function store(array $data){
        try{
            $s = new \App\Repositories\TagRepository();
            $s->store($data);
        }catch(\Throwable $e){
            Log::error([
                get_class($this) . 'store',
                'Message ' . $e->getMessage(),
                'On Line ' . $e->getLine()
            ]);
            throw new \Exception($e->getMessage());
        }
    }

    public function update(array $data, $tag){
        try{
            $s = new \App\Repositories\TagRepository();
            $s->update($data, $tag->id);
        }catch(\Throwable $e){
            Log::error([
                get_class($this) . 'update',
                'Message ' . $e->getMessage(),
                'On Line ' . $e->getLine()
            ]);
            throw new \Exception($e->getMessage());
        }
    }

    public function delete($tag){
        try{
            $s = new \App\Repositories\TagRepository();
            $s->delete($tag->id);
        }catch(\Throwable $e){
            Log::error([
                get_class($this) . 'delete',
                'Message ' . $e->getMessage(),
                'On Line ' . $e->getLine()
            ]);
            throw new \Exception($e->getMessage());
        }
    }
}
