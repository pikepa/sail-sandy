
@props([
'initialValue' => '',
'unique'=> ''])

<div class="rounded " {{$attributes}}
        wire:ignore 
        x-data 
        >

    <input id="{{$unique}}" value="{{ $initialValue }}" type="hidden">

    <div id="editor" class="mt-1 "><div>
</div>


