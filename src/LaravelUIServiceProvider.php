<?php

namespace Haq\LaravelUI;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;

class LaravelUIServiceProvider extends ServiceProvider
{
    public function boot()
    {
        UiCommand::macro('livewire', function ($command) {
            LaravelUIPreset::install();

            $command->info('Auth scaffolding installed successfully.');
            $command->comment('Please run "npm install && npm run dev" to compile your new assets.');
        });

        Paginator::useBootstrap();
    }
}
