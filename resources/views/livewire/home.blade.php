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
     


  
        <footer class="grid grid-cols-1 gap-2 bg-cyan-700 p-4 text-gray-100 rounded-b-lg">
            <div class="mt-2 grid grid-cols-3 gap-2 ">
                <div class="p-4">
                    <h5 class=" font-semibold border-b-4 border-gray-100">Find Me</h5>
                    <ul class="list-disc p-2">
                        <li><a href="https://twitter.com/lukeanthonyhunt" Alt="Luke hunt on Twitter">Find Me on Twitter</a></li>
                        <li><a href="https://www.pinterest.com.au/huntluke/" Alt="Luke hunt on Pinterest">Follow me on Pinterest</a></li>
 
                    </ul>
                </div>
                <div class="p-4">
                    <h5 class=" font-semibold border-b-4 border-gray-100">Press Clubs</h5>
                    <ul class=" pt-2">
                        <li>BANGKOK</li>
                        <li>HONG KONG</li>
                        <li>JAKARTA</li>
                        <li>KUALA LUMPUR</li>
                        <li>PHNOM PENH</li>
                        <li>TOKYO</li>
                    </ul>
                </div>
                <div class="p-4">
                    <h5 class="font-semibold border-b-4 border-gray-100">Associates</h5>
                    <div class="">
                        <ul class="list-disc p-2">
                            <li>Asia Motion</li>
                            <li>Blind Eye Productions</li>
                            <li>Craig Skehan Photos</li>
                            <li>David Fox</li>
                            <li>Lee Nutter</li>
                            <li>Little Red Blog</li>
                            <li>Luke Hunt Photos</li>
                            <li>Peter O'Sullivan Photos</li>
                            <li>Richard Reitman<l /li>
                            <li>Robert Carmichael</li>
                            <li>Ross Mueller</li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

    </x-pages.standard-page>

</x-app-layout>