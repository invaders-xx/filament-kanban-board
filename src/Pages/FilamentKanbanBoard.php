<?php

namespace InvadersXX\FilamentKanbanBoard\Pages;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Illuminate\Support\Collection;
use InvadersXX\FilamentKanbanBoard\Concerns\InteractsWithEditRecordModal;

class FilamentKanbanBoard extends Page implements HasForms
{
    use InteractsWithForms, InteractsWithEditRecordModal {
        InteractsWithEditRecordModal::getForms insteadof InteractsWithForms;
    }
    protected static string $view = 'filament-kanban-board::kanban-board';
    public bool $sortable = false;
    public bool $sortableBetweenStatuses = false;
    public string $kanbanBoardView = 'filament-kanban-board::kanban-header';
    public string $kanbanView = 'filament-kanban-board::kanban';
    public string $kanbanHeaderView = 'filament-kanban-board::kanban-header';
    public string $kanbanFooterView = 'filament-kanban-board::kanban-footer';
    public string $recordView = 'filament-kanban-board::record';
    public string $recordContentView = 'filament-kanban-board::record-content';
    public string $sortableView = 'filament-kanban-board::sortable';
    public ?string $beforeKanbanBoardView = null;
    public ?string $afterKanbanBoardView = null;
    public string $ghostClass = 'bg-warning-600';
    public bool $recordClickEnabled = false;
    public bool $modalRecordClickEnabled = false;
    protected string $editModalRecordTitle = 'Edit modal record title';
    protected string $editModalRecordWidth = '2xl';
    public string $editModalSaveButtonLabel = "Save";
    public string $editModalCancelButtonLabel = "Cancel";
    protected $listeners = [
        'onStatusChanged' => 'onStatusChanged',
        'onStatusSorted' => 'onStatusSorted',
    ];

    public function onStatusSorted($recordId, $statusId, $orderedIds): void
    {
        //
    }

    public function onStatusChanged($recordId, $statusId, $fromOrderedIds, $toOrderedIds): void
    {
        //
    }

    public function onRecordClick($recordId, $data): void
    {
        $this->editModalRecord->fill($this->getModalData($recordId, $data));
        $this->dispatchBrowserEvent('open-modal', ['id' => 'kanban--edit-modal-record']);
    }

    public function getModalData($recordId, $data): array
    {
        return $data;
    }

    protected function getViewData(): array
    {
        $statuses = $this->statuses();

        $records = $this->records();

        $styles = $this->styles();

        $statuses = $statuses
            ->map(function ($status) use ($records) {
                $status['group'] = $this->getId();
                $status['kanbanRecordsId'] = "{$this->getId()}-{$status['id']}";
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

    protected function getEditModalRecordTitle(): string
    {
        return $this->editModalRecordTitle;
    }

    protected function getEditModalRecordWidth(): string
    {
        return $this->editModalRecordWidth;
    }

    protected function getEditModalSaveButtonLabel(): string
    {
        return $this->editModalSaveButtonLabel;
    }

    protected function getEditModalCancelButtonLabel(): string
    {
        return $this->editModalCancelButtonLabel;
    }

    protected function statuses(): Collection
    {
        return collect();
    }

    protected function records(): Collection
    {
        return collect();
    }

    protected function styles(): array
    {
        return [
            'wrapper' => 'w-full h-full flex space-x-4 rtl:space-x-reverse overflow-x-auto',
            'kanbanWrapper' => 'h-full flex-1',
            'kanban' => 'bg-primary-200 rounded px-2 flex flex-col h-full',
            'kanbanHeader' => 'p-2 text-sm text-gray-900',
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
