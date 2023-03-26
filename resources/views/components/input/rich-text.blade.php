@props([
'initialValue' => '',
'unique'=> ''])


<div class="rounded " {{$attributes}}
        wire:ignore 
        x-data 
        @trix-blur="$dispatch('change', $event.target.value)">

    <input id="{{$unique}}" value="{{ $initialValue }}" type="hidden">

    <trix-editor class="trix-content" input="{{$unique}}"></trix-editor>
</div>