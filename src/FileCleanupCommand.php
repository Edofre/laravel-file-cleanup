<?php

namespace Edofre\FileCleanup;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class FileCleanupCommand extends Command
{
    /** @var string */
    protected $signature = 'cleanup:files {directory} {days=14}';
    /** @var string */
    protected $description = 'Delete all your old files from storage';

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $deletedFiles = 0;

        // Get the playlist from the CLI arguments
        $directory = $this->argument('directory');
        $days = $this->argument('days');

        // Get the cut off date
        $time = Carbon::now()->subDays($days)->timestamp;

        if (Storage::disk('local')->has($directory)) {
            $allFiles = Storage::disk('local')->files($directory);
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
