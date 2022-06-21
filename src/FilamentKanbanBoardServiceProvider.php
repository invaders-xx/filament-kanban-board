<?php

namespace InvadersXX\FilamentKanbanBoard;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentKanbanBoardServiceProvider extends PluginServiceProvider
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
