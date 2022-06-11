<div class=" ">
    <x-dash-header/>

    <div class="py-2">
        <div class="max-w-7xl mx-auto px-2">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 bg-teal-50 border-b border-gray-200">
              <!-- This example requires Tailwind CSS v2.0+ -->
              <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                  <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Posts</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the posts in your account.</p>
                  </div>
                  <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <button type="button"
                      class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                      Post</button>
                  </div>
                </div>
                <div class="mt-8 flex flex-col">
                  <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                      <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <x-table>
                          <x-slot name="head">

                            <x-table.row>
                              <x-table.heading class="text-left">Title</x-table.heading>
                              <x-table.heading class="text-left">Author</x-table.heading>
                              <x-table.heading class="text-left">Status</x-table.heading>
                              <x-table.heading class="text-left">Featured</x-table.heading>
                              <x-table.heading class="text-left"></x-table.heading>
                              <x-table.heading class="text-left"></x-table.heading>
                            </x-table.row>

                          </x-slot>
                          <x-slot name="body">
                            @forEach($posts as $post)
                            <x-table.row>
                              <x-table.cell><a href="/posts/{{$post->slug}}">{{$post->title}}</a></x-table.cell>
                              <x-table.cell>{{$post->author->name}}</x-table.cell>
                              <x-table.cell>{{$post->published_at}}</x-table.cell>
                              <x-table.cell>{{$post->featured}}</x-table.cell>
                              <x-table.cell>
                                <x-button.link wire:click="edit({{ $post->id }})">Edit</x-button.link>
                              </x-table.cell>
                              <x-table.cell>
                                <x-button.link wire:click="edit({{ $post->id }})">Delete</x-button.link>
                              </x-table.cell>

                            </x-table.row>
                            @endforeach
                          </x-slot>
                        </x-table>
                        <table class="min-w-full divide-y divide-gray-300">
                        </table>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>


</div>