<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    /**
     * data is file
     * folder for save file location
     * id for name or etc
     */
    public function uploadImage($data, $folder, $id = null){
        if($id != null){
            $prefix = 'public/files/'.$folder.'/'.$id;
        }else{
            $prefix = 'public/files/'.$folder;
        }
        $path = Storage::putFile(
            $prefix,
            $data,
        );

        return str_replace("public/","storage/",$path);
    }

}
