<div class="flex flex-row justify-between items-center p-2 text-gray-100  bg-gray-900 ">
    <div class="uppercase flex flex-row justify-left space-x-4 items-center ">
        <a href="/posts/about-us">
            <div>About Us</div>
        </a>
        <a href="/vault/">The Vault</a>

        @foreach($categories as $category)
        <a href="/category/posts/{{$category->slug}}">
            <div>{{$category->name}}</div>
        </a>
        @endforeach
    </div>
    <div>
        @auth
        <a class="uppercase text-gray-100 pr-4 " href="{!! route('dashboard')!!}">Dashboard</a>
        @endauth
        @guest
        <a class="uppercase text-gray-100 pr-4 " href="/login">Login</a>
        @endguest
    </div>
</div>