    <div class="mb-4 min-h-34 p-2 bg-teal-50 rounded-lg flex flex-row justify-between">
        <div class="ml-2 flex flex-row space-x-4 items-center">
                <div><a href='/'>Home Page</a></div>
                <div>Pages</div>
                <div>Posts</div>
                <div> <a href='/categories'>Categories</a> </div>
        </div>

         @auth
            <div class="mr-2 flex flex-row space-x-4 items-center">
                <div>
                    {{auth()->user()->name}}
                </div>
                <div class="text-end">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>