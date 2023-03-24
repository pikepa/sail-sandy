<div class="rounded-t-lg p-2 font-extrabold text-white bg-teal-800 ">
    <div class="uppercase flex flex-col justify-left sm:flex-row sm:justify-between sm:items-center p-2 ">
        <a href="/home"><div>Home</div></a>
        @foreach($categories as $category)
        <a href="/category/posts/{{$category->slug}}"><div>{{$category->name}}</div></a>
        @endforeach
        <div class="collapse sm: sm:visible">
            <input class='text-gray-700 p-2 rounded' type="text" placeholder="Search">
        </div> 
    </div>
</div>