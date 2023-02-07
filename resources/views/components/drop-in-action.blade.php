<x-forms::field-wrapper
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
    class="{{ $isLabelHidden() && !$hasInlineLabel() ? 'drop-in-action-component w-full h-full flex items-center justify-between' : null }}"
>
    <div class="{{ $isLabelHidden() && ! $hasInlineLabel() ? 'relative bottom-0' : null }}">
        @foreach ($getExecutableActions() as $executableAction)
            <x-forms::actions.action
                :action="$executableAction"
                class="flex items-center"
                component="forms::button">
                @if (!$executableAction->isLabelHidden())
                    {{ $executableAction->getLabel() }}
                @endif
            </x-forms::actions.action>
        @endforeach
    </div>
</x-forms::field-wrapper>
