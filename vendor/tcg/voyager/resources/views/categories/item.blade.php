<ol class="dd-list">
    @foreach ($items as $item)
        <li class="dd-item" data-id="{{ $item->getKey() }}">
            <div class="dd-handle" style="height:inherit">
                <span>{{ $item->getTranslatedAttribute($display_column) }}</span>
            </div>
            @if(!$item->children->isEmpty())
                @include('voyager::categories.item', ['items' => $item->children])
            @endif
        </li>
    @endforeach
</ol>
