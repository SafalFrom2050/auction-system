@props([
    'label' => false,
    'name',
    'options',
    'oKey' => 'id',
    'oValue' => 'name'
])

<label class="label-row-input">
    @if($label)<span>{{ $label }}</span>@endif
    <select wire:model.lazy="{{ $model ?? $name }}" {{ $attributes }}>
        <option>Select</option>
        @foreach($options as $option)
            <option value="{{ $option->$oKey }}">{{ $option->$oValue }}</option>
        @endforeach
    </select>
</label>
<x-common.error-msg name="{{ $name }}"/>
