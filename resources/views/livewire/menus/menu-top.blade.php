<div class="rounded-t-lg p-2 font-extrabold text-white  bg-cyan-900 ">
    <div class="uppercase flex flex-row justify-between items-center p-2 ">
        <a href="/home"><div>Home</div></a>
        @foreach($categories as $category)
        <a href="/category/posts/{{$category->slug}}"><div>{{$category->name}}</div></a>
        @endforeach
        <div class="">
            <input class='text-gray-700 p-2 rounded' type="text" placeholder="Search">
        </div> 
    </div>
</div>