<div class="bg-cyan-100 rounded h-96 overflow-hidden shadow-lg">
    <a href="/posts/{{$post->slug}}">
        <div class="flex flex-col justify-between">
            <div class="">
                <img class="object-cover h-52 w-full rounded-md " src='{{$post->cover_image}}' alt="placeimg">
            </div>
            <div class=" max-h-36 overflow-hidden">
                <div class="px-2 pt-2 font-bold text-base ">{{$post->title}}</div>
                <div class="p-2  text-sm text-clip">
                    {!! $post->body!!}
                </div>
            </div>
            <div class="px-2 font-semibold text-xsm">
                ... more
            </div>
        </div>
    </a>
</div>