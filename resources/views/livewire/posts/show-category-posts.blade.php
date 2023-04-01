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
                        <div class=" p-2 bg-cyan-100 border-b border-gray-200">
                            @if($posts->count() > 0 )
                            @foreach($posts as $post)
                            <a href="../../posts/{{$post->slug}}">
                                <div
                                    class="bg-cyan-100 flex flex-col sm:flex-row border-2 border-gray-300 shadow-md rounded-md mb-2 p-2">
                                    <div class="">
                                        <img class=" w-full h-72 sm:w-64 object-center object-cover rounded-md "
                                            src='{{$post->cover_image}}' alt="placeimg">
                                    </div>
                                    <div class="w-4/5 ml-4 flex flex-col justify-between overflow-hidden">
                                        <div>
                                            <p class="font-bold text-2xl pt-2 pb-2">{{ $post->title }}</p>
                                            @isset($post->published_at) <p class="text-xs font-bold text-gray-600">
                                                Published on {{$post->published_at->toFormattedDateString()}} by
                                                {{$post->author->name}}</p>@endisset
                                            @empty($post->published_at) <p class="text-xs font-bold text-gray-600">Not
                                                Published - Draft by {{$post->author->name}}</p>@endempty
                                            <p class="mt-2 text-gray-600">{!! $post->trimmed_body !!}.</p>
                                        </div>
                                        <div>
                                            <p><strong><em>Click for full post</em></strong></p>
                                        </div>

                                    </div>
                                </div>
                            </a>

                            @endforeach
                            @else
                            <div class="p-2">Sorry, there are currently no Articles within this Category</div>
                            @endif()
                        </div>

                    </div>
                </div>
            </div>
            {{ $posts->links() }}
        </x-pages.standard-page>
    </x-guest-layout>

</div>