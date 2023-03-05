<div class="mt-1 p-1 border-2 border-gray-200 bg-cyan-100">
    <div class="p-2 text-3xl font-bold text-gray-700 pb-4">
        {{ $channel->name }} 
    </div>
    <livewire:home.main-body :channel="$channel" />
</div>