{{-- Injected variables $status, $styles --}}
<div class="{{ $styles['kanbanWrapper'] }}">
    <x-filament::card :header="$status['title']" class="{{ $styles['kanban'] }}" id="{{ $status['id'] }}">
        <div
            id="{{ $status['kanbanRecordsId'] }}"
            data-status-id="{{ $status['id'] }}"
            class="{{ $styles['kanbanRecords'] }}">

            @foreach($status['records'] as $record)
                @include($recordView, [
                    'record' => $record,
                ])
            @endforeach

        </div>

        @include($kanbanFooterView, [
            'status' => $status
        ])

    </x-filament::card>
</div>
