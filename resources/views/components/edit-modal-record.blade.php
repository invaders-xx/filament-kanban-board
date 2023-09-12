<x-filament-panels::form wire:submit.prevent="onEditRecordSubmit">
    <x-filament::modal id="kanban--edit-modal-record" :width="$this->getEditModalRecordWidth()">
        <x-slot name="header">
            <x-filament::modal.heading>
                {{ $this->getEditModalRecordTitle() }}
            </x-filament::modal.heading>
        </x-slot>
        {{ $this->editModalRecord }}
        <x-slot name="footer">
            <x-filament::button type="submit" form="onEditRecordSubmit">
                {{$this->getEditModalSaveButtonLabel()}}
            </x-filament::button>
            <x-filament::button color="secondary" x-on:click="isOpen = false">
                {{$this->getEditModalCancelButtonLabel()}}
            </x-filament::button>
        </x-slot>
    </x-filament::modal>
</x-filament-panels::form>
