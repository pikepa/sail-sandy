<div class="bg-cyan-100 rounded h-100 overflow-hidden shadow-lg">
    <a href="/posts/{{$post->slug}}">
        <div class="flex flex-col justify-between">
            <div class="">
                <img class="h-64 w-full rounded-md object-cover object-center" src='{{$post->cover_image}}' alt="placeimg">
            </div>
            <div class="h-40 overflow-hidden">
                <div class="px-2 pt-2 font-bold text-base ">{{$post->title}}</div>
                <div class="p-2 text-sm text-clip">
                    {!! $post->body!!}
                </div>
            </div>
            <div class="px-2 font-semibold text-xsm">
                ... more
            </div>
        </div>
    </a>
</div>