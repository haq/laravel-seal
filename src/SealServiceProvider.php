<?php

namespace Haq\Seal;

use Haq\Seal\Console\InstallCommand;
use Illuminate\Support\ServiceProvider;

class SealServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            InstallCommand::class
        ]);

        //Paginator::useBootstrap();
    }

    public function provides()
    {
        return [Console\InstallCommand::class];
    }
}
