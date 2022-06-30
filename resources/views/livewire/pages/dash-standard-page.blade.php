<div>
    <x-dash-header />
    <div class="py-2">
        <div class="max-w-7xl mx-auto px-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 bg-teal-50 border-b border-gray-200">
                    @if($show =='posts')
                    <livewire:posts.manage-posts />
                    @endif

                    @if($show =='categories')
                    <livewire:category.manage-categories />
                    @endif

                    @if($show =='pages')
                    <livewire:pages.manage-pages />
                    @endif

                    @if($show =='dash')
                    <x-pages.dashboard />
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>