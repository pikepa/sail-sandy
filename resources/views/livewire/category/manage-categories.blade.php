<div>
  <div class="w-1/2 mx-auto">
    @if($showAddForm)
    @include('livewire.category.create')
    @endif

    @if($showEditForm)
    @include('livewire.category.update')
    @endif

  </div>


  @if($showTable)
  <div>
    @if (session()->has('message') && $showAlert = true)
    <x-forms.success />
    @endif
  </div>
  <div class="px-2">
    <x-pages.dash-page-sub-head title="Categories" btntext="Add Category">
      A list of all the categories in your account.
    </x-pages.dash-page-sub-head>
  </div>
  <!-- This is the table section of the page -->
  <div class="px-2 mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          <x-table>
            <x-slot name="head">

              <x-table.row>
                <x-table.heading class="text-left">Category</x-table.heading>
                <x-table.heading class="text-left">slug</x-table.heading>
                <x-table.heading class="text-left">Type</x-table.heading>
                <x-table.heading class="text-left">Status</x-table.heading>
                <x-table.heading class="text-left"></x-table.heading>
                <x-table.heading class="text-left"></x-table.heading>
              </x-table.row>

            </x-slot>
            <x-slot name="body">
              @forEach($categories as $category)
              <x-table.row>
                <x-table.cell>{{$category->name}}</x-table.cell>
                <x-table.cell>{{$category->slug}}</x-table.cell>
                <x-table.cell>{{$category->display_type}}</x-table.cell>
                <x-table.cell>{{$category->display_status}}</x-table.cell>
                <x-table.cell>
                  <x-button.link wire:click="edit({{ $category->id }})"><i class="fa-solid fa-pen-to-square"></i>
                  </x-button.link>
                </x-table.cell>
                <x-table.cell>
                  <x-button.link wire:click="delete({{ $category->id }})"><i class="fa-regular fa-trash-can"></i>
                  </x-button.link>
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
  @endif
</div>