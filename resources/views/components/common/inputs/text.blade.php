@props(['name', 'class'=>'', 'wClass'=>'', 'attributes'=>'', 'label'])

<div class={{$wClass}}>
    <label class={{$wClass}}>
        <span>{{$label ?? $name}}</span>
        <input type="text"
               class="w-full border border-gray-200 bg-gray-50 text-sm {{$class}}"
               placeholder={{$placeholder ?? $name}}
                   name={{$name}}
            {{$attributes}}
        >
    </label>
</div>
<x-common.error-msg name="{{ $name }}"/>
