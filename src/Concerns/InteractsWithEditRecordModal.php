<?php

namespace InvadersXX\FilamentKanbanBoard\Concerns;

use InvadersXX\FilamentKanbanBoard\Forms\EditModalRecord;

trait InteractsWithEditRecordModal
{
    use EditModalRecord;

    protected function setUpForms(): void
    {
        $this->editModalRecord->fill();
    }

    protected function getForms(): array
    {
        return array_merge(
            $this->getEditModalRecordForm()
        );
    }
}
