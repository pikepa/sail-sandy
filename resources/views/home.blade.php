<x-app-layout>
    <x-pages.standard-page>


        <menus class="grid grid-cols-1 border-b-2 ">

            <livewire:menus.menu-top />

            <x-menus.menu-middle />

            <livewire:menus.menu-bottom />
        </menus>


        <!-- Channels inserted here -->
        @foreach($channels as $channel)
            <x-pages.main-body-channel :$channel/>
        @endforeach
     


  
        <footer class="grid grid-cols-1 gap-2 bg-pink-600 p-4 text-gray-100 rounded-b-lg">
            <div class="mt-2 flex flex-col sm:grid sm:grid-cols-3 sm:gap-2 ">
                <div class="p-4">
                    <h5 class="font-semibold border-b-4 border-gray-100">We're also on Social Media</h5>
                        <livewire:home.display-links position="LEFT"/>
                </div>
                <div class="p-4">
                    <h5 class=" font-semibold border-b-4 border-gray-100">Press Clubs</h5>
                        <livewire:home.display-links position="CENTER"/>
                </div>
                <div class="p-4">
                    <h5 class="font-semibold border-b-4 border-gray-100">Associates</h5>
                    <div class="">
                            <livewire:home.display-links position="RIGHT"/>
                    </div>
                </div>
            </div>
        </footer>

    </x-pages.standard-page>

</x-app-layout>