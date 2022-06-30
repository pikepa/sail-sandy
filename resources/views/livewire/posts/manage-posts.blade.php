<x-pages.dash-standard-page>
  <div class="px-2">
    <!-- This Section allows add ing and update forms -->

    <div class="block">
      @if($showAddForm )
        @include('livewire.posts.create')
      @elseif($showEditForm)
        @include('livewire.posts.update')
      @endif
    </div>

    @if($showTable)
    <div>
      <div>
        @if (session()->has('message') && $showAlert = true)
        <x-forms.success />
        @endif
      </div>
    </div>
    <x-pages.dash-page-sub-head title="Posts" btntext="Add Post">
      A list of all the posts in your account.
    </x-pages.dash-page-sub-head>

    <!-- This is the table section of the page -->
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <x-table>
              <x-slot name="head">

                <x-table.row>
                  <x-table.heading class="text-left">Title</x-table.heading>
                  <x-table.heading class="text-left">Category</x-table.heading>
                  <x-table.heading class="text-left">Author</x-table.heading>
                  <x-table.heading class="text-center">Published</x-table.heading>
                  <x-table.heading class="text-left"></x-table.heading>
                  <x-table.heading class="text-left"></x-table.heading>
                </x-table.row>
              </x-slot>
              <x-slot name="body">
                @forEach($posts as $post)
                <x-table.row>
                  <x-table.cell class="text-sky-600 font-bold dark:text-sky-400"><a
                      href="/posts/{{$post->slug}}">{{$post->title}}</a></x-table.cell>
                  <x-table.cell>{{$post->category->name}}</x-table.cell>
                  <x-table.cell>{{$post->author->name}}</x-table.cell>
                  <x-table.cell class="text-center">{{$post->published_at}}</x-table.cell>
                  <x-table.cell>
                    <x-button.link wire:click="edit({{ $post->id }})"><i class="fa-solid fa-pen-to-square"></i>
                    </x-button.link>
                  </x-table.cell>
                  <x-table.cell>
                    <x-button.link wire:click="delete({{ $post->id }})"><i class="fa-regular fa-trash-can"></i>
                    </x-button.link>
                  </x-table.cell>
                </x-table.row>
                @endforeach
              </x-slot>
            </x-table>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
</x-pages.dash-standard-page>