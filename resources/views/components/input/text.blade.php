@props([
    'leadingAddOn' => false
])

<div class="flex rounded-md shadow-sm">
    @if ($leadingAddOn)
        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
            {{ $leadingAddOn }}
        </span>
    @endif

    <input {{ $attributes }}
        class="{{ $leadingAddOn ? 'rounded-none rounded-r-md' : '' }} p-2 border-1 border-gray-500 rounded-lg flex-1  block w-full "
    />
</div>