<x-app-layout>
    
<div class="p-4 text-4xl text-gray-700 font-bold text-center">All Posts</div>

@foreach($posts as $item)
<li>    {{$item->title}} <br>
{{$item->body}}
</li>
@endforeach

</x-app-layout>