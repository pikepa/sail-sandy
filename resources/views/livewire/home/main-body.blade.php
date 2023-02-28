<div class="bg-cyan-100 p-2">
    
    <div class="grid grid-cols-4 bg-cyan-100 gap-2">
        @foreach($posts as $post)

        <x-posts.card :post="$post" />

        @endforeach
    </div>

    <div class="pt-2 px-2">
        {!! $posts->links('pagination::tailwind') !!}

    </div>
</div>