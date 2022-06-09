<?php

namespace InvadersXX\FilamentKanbanBoard\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Collection;

class FilamentKanbanBoard extends Page
{
    protected static string $view = 'filament-kanban-board::kanban-board';
    public bool $sortable = false;
    public bool $sortableBetweenStatuses = false;
    public string $kanbanBoardView = 'filament-kanban-board::kanban-header';
    public string $kanbanView = 'filament-kanban-board::kanban';
    public string $kanbanFooterView = 'filament-kanban-board::kanban-footer';
    public string $recordView = 'filament-kanban-board::record';
    public string $recordContentView = 'filament-kanban-board::record-content';
    public string $sortableView = 'filament-kanban-board::sortable';
    public ?string $beforeKanbanBoardView = null;
    public ?string $afterKanbanBoardView = null;
    public string $ghostClass = 'bg-warning-600';
    public bool $recordClickEnabled = false;

    public function onStatusSorted($recordId, $statusId, $orderedIds): void
    {
        //
    }

    public function onStatusChanged($recordId, $statusId, $fromOrderedIds, $toOrderedIds): void
    {
        //
    }

    public function onRecordClick($recordId): void
    {
        //
    }

    protected function getViewData(): array
    {
        $statuses = $this->statuses();

        $records = $this->records();

        $styles = $this->styles();

        $statuses = $statuses
            ->map(function ($status) use ($records) {
                $status['group'] = $this->id;
                $status['kanbanRecordsId'] = "{$this->id}-{$status['id']}";
                $status['records'] = $records
                    ->filter(function ($record) use ($status) {
                        return $this->isRecordInStatus($record, $status);
                    });

                return $status;
            });

        return [
            'records' => $records,
            'statuses' => $statuses,
            'styles' => $styles,
        ];
    }

    protected function statuses(): Collection
    {
        return collect();
    }

    protected function records(): Collection
    {
        return collect();
    }

    public function styles(): array
    {
        return [
            'wrapper' => 'w-full h-full flex space-x-4 overflow-x-auto',
            'kanbanWrapper' => 'h-full flex-1',
            'kanban' => 'bg-primary-200 rounded px-2 flex flex-col h-full',
            'kanbanFooter' => '',
            'kanbanRecords' => 'space-y-2 p-2 flex-1 overflow-y-auto',
            'record' => 'shadow bg-white dark:bg-gray-800 p-2 rounded border',
            'recordContent' => 'w-full',
        ];
    }

    protected function isRecordInStatus($record, $status): bool
    {
        return $record['status'] === $status['id'];
    }
}
