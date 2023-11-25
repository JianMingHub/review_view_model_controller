<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $helperDirectories = [
            app_path('Helpers'.DIRECTORY_SEPARATOR.'Global'),
            app_path('Helpers'.DIRECTORY_SEPARATOR.'General'),
            app_path('Helpers'.DIRECTORY_SEPARATOR.'Auth'),
        ];
    
        foreach ($helperDirectories as $directory) {
            $rdi = new RecursiveDirectoryIterator($directory);
            $it = new RecursiveIteratorIterator($rdi);
    
            while ($it->valid()) {
                if (
                    ! $it->isDot() &&
                    $it->isFile() &&
                    $it->isReadable() &&
                    $it->current()->getExtension() === 'php' &&
                    strpos($it->current()->getFilename(), 'Helper')
                ) {
                    require $it->key();
                }
    
                $it->next();
            }
        }
    }
}
