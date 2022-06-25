<div>
    <div class="text-4xl Font-bold text-teal-900 pb-4">
        Featured Articles
    </div>
    <div class="grid grid-cols-3 gap-2">
        @foreach($posts as $post)

        <x-posts.card :post="$post" />

        @endforeach
    </div>
</div>