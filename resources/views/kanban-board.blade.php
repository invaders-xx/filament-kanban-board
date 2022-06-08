<x-filament::page>
    <div>
        <div>
            @includeIf($beforeStatusBoardView)
        </div>

        <div class="{{ $styles['wrapper'] }}">
            @foreach($statuses as $status)
                @include($statusView, [
                    'status' => $status
                ])
            @endforeach
        </div>

        <div>
            @includeIf($afterStatusBoardView)
        </div>

        <div wire:ignore>
            @includeWhen($sortable, 'filament-kanban-board::sortable', [
                'sortable' => $sortable,
                'sortableBetweenStatuses' => $sortableBetweenStatuses,
            ])
        </div>
    </div>
</x-filament::page>
