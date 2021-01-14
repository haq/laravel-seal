<?php

namespace Haq\Seal\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;

class InstallCommand extends Command
{
    protected $signature = 'seal:install';
    protected $description = 'Install laravel seal.';

    public function handle()
    {
        static::updatePackages(
            function ($packages) {
                return array_merge(
                    [
                        'bootstrap' => '^5.0.0-beta1',
                        '@popperjs/core' => '^2.5.4',
                    ],
                    Arr::except($packages, [
                        'lodash',
                        'axios',
                        'sass',
                        'sass-loader',
                    ])
                );
            }
        );

        $filesystem = new Filesystem();

        $filesystem->deleteDirectory(resource_path('sass'));
        $filesystem->deleteDirectory(base_path('node_modules'));
        $filesystem->delete(base_path('package-lock.json'));

        $filesystem->copy(__DIR__ . '/../../webpack.mix.js', base_path() . '/webpack.mix.js');
        $filesystem->copyDirectory(__DIR__ . '/../../stubs', base_path());

        $this->info('Auth scaffolding installed successfully.');
        $this->comment('Please run "npm install && npm run dev" to compile your new assets.');

        return 0;
    }

    /**
     * Update the "package.json" file.
     *
     * @param callable $callable
     * @return void
     */
    protected static function updatePackages(callable $callable)
    {
        if (!file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = 'devDependencies';

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
