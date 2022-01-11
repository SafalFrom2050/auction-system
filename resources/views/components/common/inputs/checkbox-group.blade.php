@props(['options', 'name', 'value', 'wClass', 'class', 'selectedIndexes' => []])

<div class="{{ $wClass ?? '' }}">
    @if(count($options) == 1)
        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input name="{{ $name }}"
                       id="{{ $name }}"
                       type="checkbox"
                       value="{{ array_key_first($options) }}"
                       class="form-checkbox h-3 w-3 text-gray-600 transition duration-150 ease-in-out {{ $class ?? '' }}"
                       @if(old($name, $value ?? '') == array_key_first($options)) checked="checked" @endif
                    {{ $attributes }}
                >
            </div>
            <div class="pl-2 text-sm leading-5">
                <label for="{{ $name }}" class="font-medium text-gray-700">{{ $options[array_key_first($options)] }}</label>
            </div>
        </div>
    @else
        @foreach($options as $key => $option)
            <div class="flex items-start @if($loop->index != 0) mt-2 @endif">
                <div class="flex items-center h-5">
                    <input name="{{ $name.'[]' }}"
                           id="{{ $name.$key }}"
                           type="checkbox"
                           value="{{ $key }}"
                           class="form-checkbox h-3 w-3 text-gray-600 transition duration-150 ease-in-out {{ $class ?? '' }}"
                           @if(in_array($key-1, $selectedIndexes)) checked="checked" @endif
                        {{ $attributes }}
                    >
                </div>
                <div class="pl-2 text-sm leading-5">
                    <label for="{{ $name.$key }}" class="font-medium text-gray-700">{{ $option }}</label>
                </div>
            </div>
        @endforeach
    @endif
    @include('components.common.inputs.error-message')
</div>
