<x-app-layout>
    <x-pages.standard-page>

        <menus class="grid grid-cols-1 border-b-2 ">

            <livewire:menus.menu-top />

            <x-menus.menu-middle />

            <x-menus.menu-bottom />

            <x-menus.ticker />

        </menus>

        <main class="mt-1 flex flex-row space-x-1 justify-between ">
            <div class="w-3/4 p-1 border-2 border-gray-200 bg-white">
                <div class="text-4xl Font-bold text-teal-900 pb-4">
                    Featured Articles
                </div>
                <div class="grid grid-cols-3 gap-2">
                    <a href="/posts/id-culpa-magni-qui-placeat-sapiente-in-voluptas">
                        <div class=" bg-teal-100">
                            <img class="rounded-t-lg" src="images/1.jpeg" alt="placeimg">
                            <div class="p-2 font-bold text-center text-xl">Title 1</div>
                            <p class="p-2 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </a>
                    <div class=" bg-teal-100">
                        <img class="rounded-t-lg" src="images/2.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                        <p class="p-2 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class=" bg-teal-100">
                        <img class="rounded-t-lg" src="images/3.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                        <p class="p-2 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class=" bg-teal-100">
                        <img class="rounded-t-lg" src="images/4.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                        <p class="p-2 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class=" bg-teal-100">
                        <img class="rounded-t-lg" src="images/5.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                        <p class="p-2 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class=" bg-teal-100">
                        <img class="rounded-t-lg" src="images/6.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                        <p class="p-2 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="w-1/4  bg-white border-2 p-1">
                <div class="text-center font-semibold text-3xl">Newsletter</div>
                <div class="p-2  pb-4 rounded-lg border-2 border-gray-200">
                    <a href="/subscribers/create">
                        <button
                            class="rounded text-center text-xl font-bold text-teal-900  bg-teal-400 p-2 mt-2">Subscribe
                            to our Newsletter</button>
                    </a>
                </div>

                <div class="rounded-lg border-2 border-gray-200 ">
                    <div class="p-2 text-center text-3xl Font-bold text-teal-900 pb-4">
                        The Book
                    </div>
                    <div class="row-span-2 row-end-auto">
                        <img class='rounded-lg' src="images/PT-Front-Cover.jpeg" alt="Book_cover">
                    </div>
                </div>
            </div>
        </main>
        <pods>
            <div class="p-1 border-2 border-gray-200 bg-white">
                <div class="text-3xl Font-bold text-teal-900 pb-4">
                    Podcasts
                </div>
                <div class="grid grid-cols-6 gap-2">
                    <div class=" bg-teal-100">
                        <img class="rounded-lg" src="images/1.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>
                    </div>
                    <div class=" bg-teal-100">
                        <img class="rounded-lg" src="images/2.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>

                    </div>
                    <div class=" bg-teal-100">
                        <img class="rounded-lg" src="images/3.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>

                    </div>
                    <div class=" bg-teal-100">
                        <img class="rounded-lg" src="images/4.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>

                    </div>
                    <div class=" bg-teal-100">
                        <img class="rounded-lg" src="images/5.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>

                    </div>
                    <div class=" bg-teal-100">
                        <img class="rounded-lg" src="images/6.jpeg" alt="placeimg">
                        <div class="p-2 font-bold text-center text-xl">Title 1</div>

                    </div>
                </div>
            </div>
        </pods>
        <footer class="grid grid-cols-1 gap-2 bg-gray-600 p-4 text-gray-100 rounded-b-lg">
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