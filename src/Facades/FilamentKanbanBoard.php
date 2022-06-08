<?php

namespace InvadersXX\FilamentKanbanBoard\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \InvadersXX\FilamentKanbanBoard\FilamentKanbanBoard
 */
class FilamentKanbanBoard extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-kanban-board';
    }
}
