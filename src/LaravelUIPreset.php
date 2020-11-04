<?php

namespace Haq\LaravelUI;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Laravel\Ui\Presets\Preset;

class LaravelUIPreset extends Preset
{
    public static function install()
    {
        static::updatePackages();

        $filesystem = new Filesystem();
        $filesystem->deleteDirectory(resource_path('sass'));
        $filesystem->copyDirectory(__DIR__ . '/../stubs', base_path());

        static::updateFile(base_path('app/Http/Middleware/RedirectIfAuthenticated.php'), function ($file) {
            return str_replace("RouteServiceProvider::HOME", "route('home')", $file);
        });
    }

    protected static function updatePackageArray(array $packages)
    {
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

    /**
     * Update the contents of a file with the logic of a given callback.
     */
    protected static function updateFile(string $path, callable $callback)
    {
        $originalFileContents = file_get_contents($path);
        $newFileContents = $callback($originalFileContents);
        file_put_contents($path, $newFileContents);
    }
}
