<!-- This is the spot for the Post Gallery -->

<div>
    @if($mediaItems->count()>1)
    <div class="text-2xl text-white font-bold p-2 -ml-4 -mr-4 pl-2 bg-pink-600">
        Post Gallery
    </div>

    <!-- <div class="border-2 p-4 rounded-lg mt-2 flex flex-row flex-wrap justify-between"> -->
    <div class="border-2 p-4 rounded-lg ">
        <div class="grid grid-cols-4 gap-2 ">
            @foreach($mediaItems as $item)
                @if($item->getCustomProperty('pinned', false) == true)
                    @if($post->cover_image !== $item->getFullUrl())
                    <div class="mx-auto w-full rounded-lg border text-center">
                        <img class="rounded-lg object-cover object-centre w-full" src="{{$item->getFullUrl('thumb')}}"
                            style="height:200px" alt="{{$item->name}}">
                    </div>
                    @endif
                @endif
            @endforeach

        </div>

    </div>
    @endif
</div>