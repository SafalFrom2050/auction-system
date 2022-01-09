@props([
    'label' => false,
    'name',
    'isReadOnly' => false
])

<label class="label-row-input">
    @if($label)<span>{{ $label }}</span>@endif
    <input type="checkbox" id="{{ $id ?? $name }}" name="{{ $name }}" wire:model.lazy="{{ $model ?? $name }}" readonly="{{ $isReadOnly }}" {{ $attributes }}/>
    <x-common.error-msg name="{{ $name }}" />
</label>
