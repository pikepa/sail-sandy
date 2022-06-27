<div>
    <x-guest-layout>
        <x-pages.standard-page>
            <div onclick="location.href='/';" class="cursor-pointer">
                <menus class="grid grid-cols-1 border-b-2 ">

                    <livewire:menus.menu-top />

                    <!-- <x-menus.menu-middle />

                    <x-menus.menu-bottom /> -->

                </menus>
            </div>
            <div class="py-2">
                <div class="max-w-7xl mx-auto ">
                        <div class="text-right mr-4 font-bold text-xl">
                            <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
                        </div>

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div style="float:left;" class="mr-6">
                                <img src="{{$post->cover_image}}" width='400px' alt="Cover Image">
                            </div>
                            <div class="text-3xl font-semibold">
                                {{$post->title}}
                            </div>
                            <div class="trix-content">
                                    {!!$post->body!!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </x-pages.standard-page>
    </x-guest-layout>

</div>