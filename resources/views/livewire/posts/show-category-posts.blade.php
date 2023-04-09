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
                <div class="max-w-7xl mx-auto bg-cyan-50 ">
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
                        <div class=" p-2 border-b border-gray-200">
                            @if($posts->count() > 0 )
                            @foreach($posts as $post)
                            
                            <x-listings.image-text-combo :post="$post"/> 

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