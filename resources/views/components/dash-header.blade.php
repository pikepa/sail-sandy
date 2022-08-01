<div class="mb-2 min-h-34 bg-gray-50 rounded-lg flex flex-row justify-between">
    <div class="ml-2 flex flex-row text-xl font-semibold space-x-4 items-center">
        <div class="text-2xl font-semibold rounded-xl py-2 px-4 bg-cyan-200">Dashboard</div>
        <div class="inline p-2 cursor-pointer"><a href='/'>Home</a></div>
        <div class="inline p-2 cursor-pointer"wire:click="setShow('pages') "> Pages </div>
        <div class="inline p-2 cursor-pointer"wire:click="setShow('links') "> Links </div>
        <div class="inline p-2 cursor-pointer"wire:click="setShow('posts') "> Posts </div>
        <div class="inline p-2 cursor-pointer"wire:click="setShow('categories') "> Categories </div>
        <div class="inline p-2 cursor-pointer"wire:click="setShow('dash') "> Dashboard </div>
    </div>

    @auth
    <div class="mr-2 flex flex-row text-lg font-semibold space-x-4 items-center">
        <div>
            Hi {{auth()->user()->name}}
        </div>
        <div class="text-end ">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
    @endauth
</div>