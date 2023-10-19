<x-filament-panels::page>
    <x-filament::card wire:ignore.self>
        <div>
            <div>
                @includeIf($beforeKanbanBoardView)
            </div>

            <div class="{{ $styles['wrapper'] }}">
                @foreach($statuses as $status)
                    @include($kanbanView, [
                        'status' => $status
                    ])
                @endforeach
            </div>

            <div>
                @includeIf($afterKanbanBoardView)
            </div>

            <div wire:ignore>
                @includeWhen($sortable, $sortableView, [
                    'sortable' => $sortable,
                    'sortableBetweenStatuses' => $sortableBetweenStatuses,
                ])
            </div>
        </div>
    </x-filament::card>
    @if($recordClickEnabled && $modalRecordClickEnabled)
        <x-filament-kanban-board::edit-modal-record/>
    @endif
</x-filament-panels::page>
