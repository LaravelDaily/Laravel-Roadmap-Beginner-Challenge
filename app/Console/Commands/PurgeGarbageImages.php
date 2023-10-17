<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Helpers\FilesystemHelper;

/* This command is meant to be run as a cron job. Run it every minute, or every other minute; or whenever. */

class PurgeGarbageImages extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:purge-garbage-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Purges any unused and undesired uploaded images.';

    /**
     * Execute the console command.
     */
    public function handle() {
        $filesystemImages = collect(Storage::disk(FilesystemHelper::DISK_FOR_UPLOADS)->files());
        $filesystemImages->transform(function (string $item, int $key) {
            return FilesystemHelper::DISK_FOR_UPLOADS . '/' . $item;
        });
        //var_dump($filesystemImages);
        $dbImages = DB::table('articles')
                        ->select('image')
                        ->whereNotNull('image')
                        ->whereRaw("image like '" . FilesystemHelper::DISK_FOR_UPLOADS . "%'")
                        ->distinct()
                        ->get()
                        ->pluck('image');
        //var_dump($dbImages);
        $diffImages = $filesystemImages->diff($dbImages);
        //var_dump($diffImages);
        $diffImages->transform(function (string $item, int $key) {
            return substr($item, strlen(FilesystemHelper::DISK_FOR_UPLOADS) + 1);
        });
        //var_dump($diffImages);
        $diffImages->each(function (string $item, int $key) {
            Storage::disk(FilesystemHelper::DISK_FOR_UPLOADS)->delete($item);
        });
        $this->info(strval($diffImages->count()) . ' undesirable image(s) removed.');
    }
}