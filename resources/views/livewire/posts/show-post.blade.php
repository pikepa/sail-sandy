<div>
    <x-guest-layout>
        <x-pages.standard-page>
            <div onclick="location.href='/';" class="cursor-pointer">
                <menus class="grid grid-cols-1 border-b-2 ">

                    <x-menus.menu-top />

                    <x-menus.menu-middle />

                    <x-menus.menu-bottom />

                </menus>
            </div>
            <div class="py-2">
                <div class="max-w-7xl mx-auto ">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div>
                                Title: {{$post->title}}
                            </div>
                            <div>
                                Body: {{$post->body}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-pages.standard-page>
    </x-guest-layout>

</div>