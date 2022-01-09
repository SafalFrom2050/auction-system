@props([
    'value' => 'GO BACK',
    'action' => 'showList'
])

<div class="flex-row justify-end">
    <button wire:click="{{ $action }}" wire:loading.remove class="button-outline">{{ $value }}</button>
</div>
