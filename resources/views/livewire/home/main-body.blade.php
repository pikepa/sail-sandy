<div class="bg-cyan-100 p-2">
    
    <div class="grid sm:grid-cols-2 md:grid-cols-4 bg-cyan-100 gap-2">
        @foreach($posts as $post )

            <x-posts.card :post="$post" />

            @if($loop->iteration == 4)
                @break
            @endif
        @endforeach
    </div>

    @if($this->postCount >= 5 )
    <div class="flex justify-end font-semibold text-2xl text-red-600 pt-2 px-2">
       <a href="{{ route('channelposts', ['chan_slug' => $this->channel->slug]) }}">Show More....</a> 
    </div>
    @endif
</div>