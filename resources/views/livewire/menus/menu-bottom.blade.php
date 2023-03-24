<div class="flex flex-row justify-between items-center p-4 text-gray-100 font-extrabold bg-teal-800 ">
    <div class="uppercase flex flex-col sm:flex-1 sm:flex-row sm:justify-between sm:items-center ">
        <a href="/">
            <div>About Us</div>
        </a>
  
        @foreach($categories as $category)
        <a href="/category/posts/{{$category->slug}}">
            <div>{{$category->name}}</div>
        </a>
        @endforeach

        <a href="/vault/">The Vault</a>

        <div class="sm:invisible">
            @auth
            <a class="uppercase text-gray-100 pr-4 " href="{!! route('dashboard')!!}">Dashboard</a>
            @endauth
            @guest
            <a class="uppercase text-gray-100 pr-4 " href="/login">Login</a>
            @endguest
        </div>
    </div>
    <div class="invisible sm:visible">
        @auth
        <a class="uppercase text-gray-100 pr-4 " href="{!! route('dashboard')!!}">Dashboard</a>
        @endauth
        @guest
        <a class="uppercase text-gray-100 pr-4 " href="/login">Login</a>
        @endguest
    </div>
</div>