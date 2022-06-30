<x-app-layout>
    <x-pages.dash-standard-page>
        <div wire:key="foo">
            @if($vDash)
            <x-pages.dashboard />

            @elseif($vPost)
            <livewire:posts.manage-posts />
            @endif
        </div>
    </x-pages.dash-standard-page>
</x-app-layout>