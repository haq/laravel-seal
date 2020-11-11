<?php

namespace Haq\Seal;

use Illuminate\Support\ServiceProvider;

class SealServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            Console\InstallCommand::class
        ]);
    }

    public function provides()
    {
        return [Console\InstallCommand::class];
    }
}
