    <div class="mb-4 min-h-34 p-2 bg-teal-50 rounded-lg flex flex-row justify-between">
        <div class="ml-2 flex flex-row text-xl font-semibold space-x-4 items-center">
                <div><a href='/'>Home Page</a></div>
                @if (URL::current() != url('/pages') )<div> <a href="{!! route('pages.index')!!}">Manage Pages</a> </div>@endif
                @if (URL::current() != url('/posts') )<div> <a href="{!! route('posts.index')!!}">Manage Posts</a> </div>@endif
                @if (URL::current() != url('/categories') )<div> <a href="{!! route('categories.index')!!}">Manage Categories</a> </div>@endif
                @if (URL::current() != url('/dashboard') )<div> <a href="{!! route('dashboard')!!}">Dashboard</a> </div>@endif
            </div>

         @auth
            <div class="mr-2 flex flex-row text-lg font-semibold space-x-4 items-center">
                <div>
                   Hi {{auth()->user()->name}}
                </div>
                <div class="text-end ">
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