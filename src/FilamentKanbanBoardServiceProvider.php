<?php

namespace InvadersXX\FilamentKanbanBoard;

use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentKanbanBoardServiceProvider extends PackageServiceProvider
{    
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-kanban-board')
            ->hasConfigFile()
            ->hasViews();
    }
}
