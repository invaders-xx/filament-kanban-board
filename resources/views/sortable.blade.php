<script>
    window.onload = () => {
        @foreach($statuses as $status)

        {{-- Added space to fix issues with Livewire cutting off some code with comment block in livewire 3 and filament 3--}}
        Sortable.create(document.getElementById('{{ $status['kanbanRecordsId'] }}'), {
            group: '{{ $sortableBetweenStatuses ? $status['group'] : $status['id'] }}',
            animation: 0,
            ghostClass: '{{ $ghostClass }}',

            setData: function (dataTransfer, dragEl) {
                dataTransfer.setData('id', dragEl.id);
            },

            onEnd: function (evt) {
                const sameContainer = evt.from === evt.to;
                const orderChanged = evt.oldIndex !== evt.newIndex;

                if (sameContainer && !orderChanged) {
                    return;
                }

                const recordId = evt.item.id;

                const fromStatusId = evt.from.dataset.statusId;
                const fromOrderedIds = [].slice.call(evt.from.children).map(child => child.id);

                if (sameContainer) {
                    Livewire.dispatch('onStatusSorted', {recordId, statusId: fromStatusId, orderedIds: fromOrderedIds});
                    return;
                }

                const toStatusId = evt.to.dataset.statusId;
                const toOrderedIds = [].slice.call(evt.to.children).map(child => child.id);

                Livewire.dispatch('onStatusChanged', {recordId, statusId: toStatusId, fromOrderedIds, toOrderedIds});
            },
        });

        @endforeach
    }
</script>
