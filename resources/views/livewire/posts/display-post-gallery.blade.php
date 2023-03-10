<!-- This is the spot for the Post Gallery -->

<div>
    @if($mediaItems->count()>1)
    <div class="text-xl font-bold pt-2 pl-4 bg-cyan-50">
        Post Gallery
    </div>

    <!-- <div class="border-2 p-4 rounded-lg mt-2 flex flex-row flex-wrap justify-between"> -->
    <div class="border-2 p-4 rounded-lg ">
        <div class="grid grid-cols-3 gap-2 ">
            @foreach($mediaItems as $item)
            @if($post->cover_image !== $item->getFullUrl())
            <div class="mx-auto w-full rounded-lg border text-center">
                <img class="rounded-t-lg object-cover object-centre w-full" src="{{$item->getFullUrl()}}"
                    style="height:325px" alt="{{$item->name}}">
            </div>
            @endif
            @endforeach

        </div>

    </div>
    @endif
</div>