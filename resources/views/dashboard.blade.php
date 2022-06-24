<x-app-layout>
    <div>
        <x-dash-header />
        <div class="py-2">
            <div class="max-w-7xl mx-auto px-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <ul>
                            <li class="list-disc"><a href="{!!route('posts.index')!!}">Posts</a></li>
                            <li class="list-disc"><a href="{!!route('categories.index')!!}">Categories</a></li>
                            <li class="list-disc"><a href="#">Pages</a></li>
                            <li class="list-disc"><a href="#">Podcasts</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>