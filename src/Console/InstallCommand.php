<?php

namespace Haq\Seal\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;

class InstallCommand extends Command
{
    protected $signature = 'seal:install';
    protected $description = 'Install the Breeze controllers and resources';

    public function handle()
    {
        static::updatePackages(
            function ($packages) {
                return array_merge(
                    [
                        'bootstrap' => '^5.0.0-alpha2',
                        'popper.js' => '^1.16.1-lts',
                        'sass' => '^1.15.2',
                        'sass-loader' => '^8.0.0',
                    ],
                    Arr::except($packages, [
                        'lodash',
                        'axios',
                    ])
                );
            }
        );

        $filesystem = new Filesystem();

        $filesystem->deleteDirectory(resource_path('sass'));
        $filesystem->deleteDirectory(base_path('node_modules'));
        $filesystem->delete(base_path('package-lock.json'));

        $filesystem->copyDirectory(__DIR__ . '/../../stubs', base_path());

        $this->info('Auth scaffolding installed successfully.');
        $this->comment('Please run "npm install && npm run dev" to compile your new assets.');
    }

    /**
     * Update the "package.json" file.
     *
     * @param callable $callable
     * @param bool $dev
     * @return void
     */
    protected static function updatePackages(callable $callable, $dev = true)
    {
        if (!file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callable(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );
    }
}
