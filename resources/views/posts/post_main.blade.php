<x-app-layout>
    
All Posts


@foreach($posts as $item)
<li class="list-disc">    {{$item->title}} </li>
@endforeach

</x-app-layout>