<div>
    <livewire:home.main-body-header />
    
    <div class="grid grid-cols-3 gap-2">
        @foreach($posts as $post)

        <x-posts.card :post="$post" />

        @endforeach
    </div>
    <div class="pt-2 px-2">
        {!! $posts->links('pagination::tailwind') !!}

    </div>
</div>