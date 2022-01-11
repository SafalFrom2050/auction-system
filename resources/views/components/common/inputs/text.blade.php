@props(['name', 'class'=>'', 'wClass'=>'', 'attributes'=>'', 'label'])

<div class={{$wClass}}>
    <label class={{$wClass}}>
        <span>{{$label ?? $name}}</span>
        <input type="text"
               class="w-full border border-gray-200 bg-gray-50 text-sm @error($name) border-red-400 @enderror {{$class}}"
               placeholder={{$placeholder ?? $name}}
                   name={{$name}}
            {{$attributes}}
        >
    </label>
</div>
<x-common.error-msg name="{{ $name }}"/>
