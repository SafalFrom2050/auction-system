@props([
    'type' => 'loading',
    'target' => null
])

<div
    class="spinner-wrapper"
    @if($type == 'loading') wire:loading @endif
    @if($target) wire:target="{{ $target }}" @endif>
    <div class="spinner-rotate" >
        :Oo(
    </div>
</div>
