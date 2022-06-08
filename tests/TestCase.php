<?php

namespace InvadersXX\FilamentKanbanBoard\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use InvadersXX\FilamentKanbanBoard\FilamentKanbanBoardServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'InvadersXX\\FilamentKanbanBoard\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            FilamentKanbanBoardServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_filament-kanban-board_table.php.stub';
        $migration->up();
        */
    }
}
