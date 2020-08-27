<?php

namespace Edofre\FileCleanup;

class FileCleanupServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FileCleanupCommand::class,
            ]);
        }
    }

    public function register()
    {
        // 
    }
}
