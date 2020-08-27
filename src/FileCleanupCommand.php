<?php

namespace Edofre\FileCleanup;

class FileCleanupCommand extends \Illuminate\Console\Command
{
    /** @var string */
    protected $signature = 'cleanup:files {directory : The name of the model you want to delete} {days: Files older than this amount of days are deleted}';
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

        var_dump($days);
        dd($directory);
        
        $this->info("$this->item_count items deleted");
        $this->error("Class not found in system");
    }
}