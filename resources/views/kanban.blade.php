{{-- Injected variables $status, $styles --}}
<div class="{{ $styles['kanbanWrapper'] }}">
    <div class="{{ $styles['kanban'] }}" id="{{ $status['id'] }}">

        @include($kanbanHeaderView, [
            'status' => $status
        ])

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

    </div>
</div>
