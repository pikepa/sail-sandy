<div class="bg-cyan-100 p-2">
    
    <div class="grid grid-cols-4 bg-cyan-100 gap-2">
        @foreach($posts as $post )
        <x-posts.card :post="$post" />
            @if($loop->iteration == 4)
                @break
            @endif
        @endforeach
    </div>

    @if($this->postCount >= 5 )
    <div class="flex justify-end font-semibold text-2xl text-red-600 pt-2 px-2">
        Show More.... 
    </div>
    @endif
</div>