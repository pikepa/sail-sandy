<!-- This is the spot for the Post Gallery -->

<div>
    @isset($mediaItems)
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
                <div class="px-4 mt-2 flex flex-row justify-between">
                    <button wire:click="make_featured('{{ $item->getFullUrl() }}')"><i
                            class="fa-solid fa-bolt-lightning"></i></button>
                    <button wire:click="deleteImage({{ $item->id }})"><i class="fa-regular fa-trash-can"></i></button>
                </div>
            </div>
            @endif
            @endforeach

        </div>

    </div>


    <div>
        @isset($post_id)
        <div class="">
            <div class="pt-4 ml-4">
                <input wire:model='newImage' type="file" />
            </div>
            <div class="mt-4 ml-4">
                <button class="w-28 p-2 rounded-lg bg-green-500 font-semibold" wire:click="storeFile">Upload</button>
            </div>
        </div>
        @endisset
    </div>

    @endisset
</div>