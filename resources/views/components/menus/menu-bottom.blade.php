<div class="flex flex-row justify-between items-center p-2 text-center bg-gray-900">
    <ul class="uppercase flex text-gray-100 justify-left items-center p-2 ">
        <li class="mr-6">About Us</li>
        <li class="mr-6">Correspondents</li>
        <li>Broadcasts</li>
    </ul>
    <div>
        @auth
        <a class="uppercase text-gray-100 pr-4 " href="/dashboard">Dashboard</a>
        @endauth
        @guest
        <a class="uppercase text-gray-100 pr-4 " href="/login">Login</a>
        @endguest
    </div>
</div>