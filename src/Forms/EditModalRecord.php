<?php

namespace InvadersXX\FilamentKanbanBoard\Forms;

trait EditModalRecord
{
    public $editModalRecordState = [];
    public $editModalRecordId;

    public function onEditRecordSubmit(): void
    {
        $this->editRecord($this->editModalRecordId, $this->editModalRecord->getState());

        $this->dispatchBrowserEvent('close-modal', ['id' => 'kanban--edit-modal-record']);
    }

    public function editRecord($recordId, array $data): void
    {
        // Override this function and do whatever you want with $data
    }

    public function onRecordClick($recordId, $data): void
    {
        $this->editModalRecordId = $recordId;
        
        $this->editModalRecord->fill($this->getModalData($recordId, $data));

        $this->dispatchBrowserEvent('open-modal', ['id' => 'kanban--edit-modal-record']);
    }

    public function getModalData($recordId, $data): array
    {
        return $data;
    }

    protected static function getEditModalRecordSchema(): array
    {
        return [];
    }

    protected function getEditModalRecordForm(): array
    {
        return [
            'editModalRecord' => $this->makeForm()
                ->schema(static::getEditModalRecordSchema())
                ->statePath('editModalRecordState'),
        ];
    }
}
