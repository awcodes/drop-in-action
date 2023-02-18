@php
    $isLabelHidden = $isLabelHidden();
    $hasInlineLabel = $hasInlineLabel();
@endphp

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
    @class([
        'drop-in-action-component',
        'w-full h-full flex items-end justify-between' => $isLabelHidden && ! $hasInlineLabel
    ])
>
    <div
        class="drop-in-action-actions-container relative flex items-center"
        @if ($isLabelHidden && ! $hasInlineLabel)
            style="padding-block-end: 1px;"
        @endif
    >
        @foreach ($getExecutableActions() as $executableAction)
            @if (! $executableAction->isHidden())
                {{ $executableAction }}
            @endif
        @endforeach
    </div>
</x-dynamic-component>
