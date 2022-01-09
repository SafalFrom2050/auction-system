@props([
    'label' => false,
    'name',
    'type' => 'text'
])

@if($label)<label for="{{ $id ?? $name }}">{{ $label }}</label>@endif
<input type="{{ $type }}" id="{{ $id ?? $name }}" name="{{ $name }}"
       wire:model.debounce.500ms="{{ $model ?? $name }}" {{ $attributes }}/>
<x-common.error-msg name="{{ $name }}"/>
