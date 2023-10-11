<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Helpers\FilesystemHelper;

class GenerateGarbageFiles extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-garbage-files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a bunch of garbage files. For testing. To be deleted afterwards with PurgeGarbageImages.';

    /**
     * Execute the console command.
     */
    public function handle() {
        $n = rand(3,9);
        for ($i=0; $i<$n; $i++) {
            Storage::disk(FilesystemHelper::DISK_FOR_UPLOADS)->put('garbage' . strval($i) . '.txt', fake()->text(80));
        }
        $this->info(strval($n) . ' garbage files successfully generated.');
    }
}