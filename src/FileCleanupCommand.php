<?php

namespace Edofre\FileCleanup;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class FileCleanupCommand extends Command
{
    /** @var string */
    protected $signature = 'cleanup:files {directory : The name of the model you want to delete} {days : Files older than this amount of days are deleted}';
    /** @var string */
    protected $description = 'Delete all your old files from storage';

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        // Get the playlist from the CLI arguments
        $directory = $this->argument('directory');
        $days = $this->argument('days');

        var_dump($directory, $days);

        if (Storage::disk('local')->has($directory)) {
            $allFiles = Storage::disk('local')->files($directory);
            var_dump($allFiles);
        } else {
            $this->error("Directory '{$directory}' not found.");
        }

        // $time = Storage::lastModified($file);
        // Storage::delete(['file.jpg', 'file2.jpg']);

        // $this->info("$this->item_count items deleted");
        // $this->error("Class not found in system");
    }
}
