@props([
    'action',
    'value' => 'SUBMIT',
    'class' => ''
])

<button
    wire:click.prevent="{{ $action ?? '' }}"
    class="button-fill mt-4 font-bold {{$class}}"
    wire:loading.attr="disabled"
    wire:target="{{ $action ?? '' }}"
    {{ $attributes }}
>

    {{ $value }}
</button>
