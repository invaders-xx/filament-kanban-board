<?php

namespace InvadersXX\FilamentKanbanBoard;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentKanbanBoardServiceProvider extends PackageServiceProvider
{
    protected array $scripts = [
    ];

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
