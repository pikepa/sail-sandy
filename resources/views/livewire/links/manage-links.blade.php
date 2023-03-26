<div>
  <div class="w-1/2 mx-auto">
    @if($showAddForm)
    @include('livewire.links.create')
    @endif

    @if($showEditForm)
    @include('livewire.links.update')
    @endif
  </div>

  @if($showTable)
      <div>
          @if (session()->has('message') && $showAlert = true)
          <x-forms.success />
          @endif
        </div>
      <x-pages.dash-page-sub-head title="Links" btntext="Add Link">
        A list of all the links in your account.
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
                    <x-table.heading class="text-left">Url</x-table.heading>
                    <x-table.heading class="text-left">Position</x-table.heading>
                    <x-table.heading class="text-left">Sort</x-table.heading>
                    <x-table.heading class="text-left">Status</x-table.heading>
                    <x-table.heading class="text-left"></x-table.heading>
                    <x-table.heading class="text-left"></x-table.heading>
                  </x-table.row>
                </x-slot>
                <x-slot name="body">
                  @forEach($links as $link)
                  <x-table.row>
                    <x-table.cell>{{$link->title}}</x-table.cell>
                    <x-table.cell>{{$link->url}}</x-table.cell>
                    <x-table.cell>{{$link->position}}</x-table.cell>
                    <x-table.cell>{{$link->sort}}</x-table.cell>
                    <x-table.cell>{{$link->status}}</x-table.cell>
                    <x-table.cell>
                      <x-button.link wire:click="edit({{ $link->id }})"><i class="fa-solid fa-pen-to-square"></i>
                      </x-button.link>
                    </x-table.cell>
                    <x-table.cell>
                      <x-button.link wire:click="delete({{ $link->id }})"><i class="fa-regular fa-trash-can"></i>
                      </x-button.link>
                    </x-table.cell>
                  </x-table.row>
                  @endforeach
                </x-slot>
              </x-table>
            </div>
          </div>
        </div>
      @endif
  </div>
</div>