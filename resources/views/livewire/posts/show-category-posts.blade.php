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
            <div class=" ">
                <div class="max-w-7xl mx-auto bg-cyan-100 ">
                    <div class=" pt-2 flex flex-row justify-between items-center">
                        <div class="">
                            <div class="ml-4  font-bold text-3xl">
                                {{$category->name}}
                            </div>

                        </div>
                        <div class="text-right  mr-4 font-bold text-xl">
                            <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="ml-4 text-base">
                        {!!$category->description!!}
                    </div>
                    <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-2 bg-cyan-100 border-b border-gray-200">
                        @if($posts->count() > 0 )
                            @foreach($posts as $post)
                                <div class="bg-cyan-100 flex flex-row border-2 border-gray-300 shadow-md rounded-md mb-2 p-2">
                                    <div class="w-1/5">
                                        <img class="object-cover h-44 w-full rounded-md " src='{{$post->cover_image}}'
                                            alt="placeimg">
                                    </div>
                                    <div class="w-4/5 ml-4 max-h-36 overflow-hidden">
                                        <a href="../../posts/{{$post->slug}}" ;
                                            class="block text-lg leading-tight font-bold text-gray-900 hover:underline">{{$post->title}}</a>
                                            @isset($post->published_at) <p class="text-xs font-bold text-gray-600">Published on {{$post->published_at->toFormattedDateString()}} by {{$post->author->name}}</p>@endisset
                                            @empty($post->published_at) <p class="text-xs font-bold text-gray-600">Not Published - Draft by {{$post->author->name}}</p>@endempty
                                        <p class="mt-2 text-gray-600">{!!$post->body!!}.</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                                <div class="p-2">Sorry, there are currently no Posts within this Category</div>
                        @endif()
                        </div>

                    </div>
                </div>
            </div>
        </x-pages.standard-page>
    </x-guest-layout>

</div>