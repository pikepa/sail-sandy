@props([
    'label',
    'for',
    'width' => 'full',
    'error' => false,
    'helpText' => false,
])

<div >
    <label for="{{ $for }}" class="block pb-2 font-bold leading-5 text-gray-700">
        {{ $label }}
    </label>

    <div class="w-{{$width}} mt-2 sm:mt-0 sm:col-span-2">
        {{ $slot }}

        @if ($error)
            <div class="mt-1 text-red-500 text-sm">{{ $error }}</div>
        @endif

        @if ($helpText)
            <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
        @endif
    </div>
</div>