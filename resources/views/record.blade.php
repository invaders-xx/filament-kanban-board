
{{-- Injected variables $record, $styles --}}
<div
    id="{{ $record['id'] }}"
    @if($recordClickEnabled)
        wire:click="onRecordClick('{{ $record['id'] }}',{{@json_encode($record)}})"
    @endif
    class="{{ $styles['record'] }}">

    @include($recordContentView, [
        'record' => $record,
        'styles' => $styles,
    ])

</div>
