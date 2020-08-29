<?php

namespace Edofre\FileCleanup;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class FileCleanupCommand extends Command
{
    /** @var string */
    protected $signature = 'cleanup:files {directory} {days=14} {disk=local}';
    /** @var string */
    protected $description = 'Delete all your old files from storage';

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $deletedFiles = 0;

        // Get all the arguments
        $directory = $this->argument('directory');
        $days = $this->argument('days');
        $disk = $this->argument('disk');

        // Get the cut off date, files <= than this will be deleted
        $time = Carbon::now()->subDays($days)->timestamp;

        if (Storage::disk($disk)->has($directory)) {
            $allFiles = Storage::disk($disk)->files($directory);
            foreach ($allFiles as $file) {
                if (Storage::lastModified($file) <= $time) {
                    Storage::delete($file);
                    $deletedFiles++;
                }
            }
        } else {
            $this->error("Directory '{$directory}' not found.");
        }

        $this->info("$deletedFiles items deleted");
    }
}
