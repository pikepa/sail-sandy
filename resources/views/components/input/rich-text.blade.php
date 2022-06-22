@props(['initialValue' => ''])


<div class="rounded " {{$attributes}}
        wire:ignore 
        x-data 
        @trix-blur="$dispatch('change', $event.target.value)">

    <input id="x" value="{{ $initialValue }}" type="hidden">

    <trix-editor input="x"></trix-editor>
</div>