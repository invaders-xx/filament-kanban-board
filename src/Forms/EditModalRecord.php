<?php
namespace InvadersXX\FilamentKanbanBoard\Forms;


trait EditModalRecord
{
    public $editModalRecordState = [];

    public function onEditRecordSubmit(): void
    {
        $this->editRecord($this->editModalRecord->getState());

        $this->dispatchBrowserEvent('close-modal', ['id' => 'kanban--edit-modal-record']);
    }

    public function editRecord(array $data): void
    {
        // Override this function and do whatever you want with $data
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
