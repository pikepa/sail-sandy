<x-app-layout>
    <x-pages.standard-page>


        <menus class="grid grid-cols-1 border-b-2 ">

            <livewire:menus.menu-top />

            <x-menus.menu-middle />

            <livewire:menus.menu-bottom />

            <!-- <x-menus.ticker /> -->

        </menus>
        <tvprods>
            <div class="mt-1 p-1 border-2 border-gray-200 bg-cyan-100">
                <div class="p-2 text-3xl font-bold text-gray-700 pb-4">
                    Television Productions
                </div>
                <div class="grid grid-cols-4 gap-2">

                    <div class="bg-cyan-100">
                        <img class="rounded-lg" src="images/3.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                        <div class="p-2  text-sm">This is some follow on text for a small paragraph, making approximately three lines</div>

                    </div>
                    <div class="bg-cyan-100">
                        <img class="rounded-lg" src="images/4.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                        <div class="p-2  text-sm">This is some follow on text for a small paragraph, making approximately three lines</div>

                    </div>
                    <div class="bg-cyan-100">
                        <img class="rounded-lg" src="images/5.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                        <div class="p-2  text-sm">This is some follow on text for a small paragraph, making approximately three lines</div>

                    </div>
                    <div class="bg-cyan-100">
                        <img class="rounded-lg" src="images/6.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                        <div class="p-2  text-sm">This is some follow on text for a small paragraph, making approximately three lines</div>

                    </div>
                </div>
            </div>
        </tvprods>

        <audipods>
            <div class="mt-1 p-1 border-2 border-gray-200 bg-cyan-100">
                <div class="p-2 text-3xl font-bold text-gray-700 pb-4">
                    Audio and Podcasts
                </div>
                <div class="grid grid-cols-4 gap-2">

                    <div class="bg-cyan-100">
                        <img class="rounded-lg" src="images/1.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                        <div class="p-2  text-sm">This is some follow on text for a small paragraph, making approximately three lines</div>

                    </div>
                    <div class="bg-cyan-100">
                        <img class="rounded-lg" src="images/4.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                        <div class="p-2  text-sm">This is some follow on text for a small paragraph, making approximately three lines</div>

                    </div>
                    <div class="bg-cyan-100">
                        <img class="rounded-lg" src="images/5.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                        <div class="p-2  text-sm">This is some follow on text for a small paragraph, making approximately three lines</div>

                    </div>
                    <div class="bg-cyan-100">
                        <img class="rounded-lg" src="images/6.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                        <div class="p-2  text-sm">This is some follow on text for a small paragraph, making approximately three lines</div>

                    </div>
                </div>
            </div>
        </audiopods>
        <main class="mt-1 flex flex-row space-x-1 justify-between ">
            <div class="w-3/4 rounded-lg border-2 border-gray-200 bg-white">
                <livewire:home.main-body />
            </div>
            <div class="w-1/4  bg-cyan-100 border-2 rounded-lg p-1">
                <x-pages.home_rhs_column /> 
            </div>
        </main>
  <books>
            <div class="mt-1 p-1 border-2 border-gray-200 bg-cyan-100">
                <div class="p-2 text-3xl font-bold text-gray-700 pb-4">
                    Published Books
                </div>
                <div class="grid grid-cols-4 gap-2">

                    <div class="bg-cyan-100">
                        <img class="rounded-lg" src="images/3.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                        <div class="p-2  text-sm">This is some follow on text for a small paragraph, making approximately three lines</div>

                    </div>
                    <div class="bg-cyan-100">
                        <img class="rounded-lg" src="images/4.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                        <div class="p-2  text-sm">This is some follow on text for a small paragraph, making approximately three lines</div>

                    </div>
                    <div class="bg-cyan-100">
                        <img class="rounded-lg" src="images/5.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                        <div class="p-2  text-sm">This is some follow on text for a small paragraph, making approximately three lines</div>

                    </div>
                    <div class="bg-cyan-100">
                        <img class="rounded-lg" src="images/6.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                        <div class="p-2  text-sm">This is some follow on text for a small paragraph, making approximately three lines</div>

                    </div>
                </div>
            </div>
        </audiopods>
        <footer class="grid grid-cols-1 gap-2 bg-cyan-700 p-4 text-gray-100 rounded-b-lg">
            <div class="mt-2 grid grid-cols-3 gap-2 ">
                <div class="p-4">
                    <h5 class=" font-semibold border-b-4 border-gray-100">Recent Posts</h5>
                    <ul class="list-disc p-2">
                        <li>Troubled Waters, a podcast with Abby Seiff </li>
                        <li>War & Hypersonics, a podcast with Carl Schuster</li>
                        <li>Workers Rights, a podcast with Dave Welsh</li>
                        <li>Mekong Drought, a podcast with Brian Eyler</li>
                        <li>Reds & Whites in Asia, a podcast with Darren Gall</li>
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