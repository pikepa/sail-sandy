<div>
    <x-guest-layout>
        <x-pages.standard-page>
            <div onclick="location.href='/';" class="cursor-pointer">
                <menus class="grid grid-cols-1 border-b-2 ">

                    <livewire:menus.menu-top />

                    <x-menus.menu-middle />

                    <livewire:menus.menu-bottom />

                </menus>
            </div>
            <div class="py-2 bg-cyan-100" >
                <div class="max-w-7xl mx-auto ">
<div class="flex flex-row justify-between items-center">
    <div class="ml-4 pt-2 text-3xl font-semibold">
        {{$post->title}}
       @isset($post->published_at) <p class="text-xs font-bold text-gray-600">Published on {{$post->published_at->toFormattedDateString()}} by {{$post->author->name}}</p>@endisset
       @empty($post->published_at) <p class="text-xs font-bold text-gray-600">Not Published - Draft by {{$post->author->name}}</p>@endempty

    </div>
    <div class="text-right mr-4 font-bold text-xl">
        <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>

</div>
                    <div class="bg-cyan-100 overflow-hidden shadow-sm rounded-lg">
                        <div class="p-4  border-b border-gray-200">
                            <div style="float:left;" class="mr-6">
                                <img src="{{$post->cover_image}}" width='400px' alt="Cover Image">
                            </div>

                            <div class="trix-content">
                                    {!!$post->body!!}
                            </div>

                        </div>
                        <livewire:posts.display-post-gallery :post='$post'/>
                        
                    </div>
                </div>
            </div>
        </x-pages.standard-page>
    </x-guest-layout>

</div>