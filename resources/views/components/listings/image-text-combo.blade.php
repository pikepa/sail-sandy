<div>
    <a href="../../posts/{{$post->slug}}">
        <div
            class="bg-cyan-100  flex flex-col sm:flex-row border-2 border-gray-300 shadow-md rounded-md mb-2 p-2">
            <div class="">
                <img class=" w-full h-64  sm:w-64 object-center object-cover rounded-md "
                    src='{{$post->cover_image}}' alt="placeimg">
            </div>
            <div class="w-4/5 ml-4 flex flex-col justify-between overflow-hidden">
                <div>
                    <p class="font-bold text-2xl pt-2">{{ $post->title }}</p>
                    @isset($post->published_at) <p class="text-xs font-bold text-gray-600">
                        Published on {{$post->published_at->toFormattedDateString()}} by
                        {{$post->author->name}}</p>@endisset
                    @empty($post->published_at) <p class="text-xs font-bold text-gray-600">Not
                        Published - Draft by {{$post->author->name}}</p>@endempty
                    <p class="mt-2 text-gray-600">{!! $post->trimmed_body !!}.</p>
                </div>
                <div class="pt-2">
                    @if(! Str::length($post->trimmed_body < 300 ))
                    <p><strong><em>Click for full post</em></strong></p>
                    @endif
                </div>

            </div>
        </div>
    </a>
</div>