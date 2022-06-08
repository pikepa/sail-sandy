<x-app-layout>
    <div>
      <x-dash-header />

      <div class="py-2">
        <div class="max-w-7xl mx-auto px-2">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 bg-teal-50 border-b border-gray-200">
              <!-- This example requires Tailwind CSS v2.0+ -->
              <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                  <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Categories</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the categories in your account.</p>
                  </div>
                  <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <button type="button"
                      class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                      Category</button>
                  </div>
                </div>
                <div class="mt-8 flex flex-col">
                  <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                      <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <x-table>
                          <x-slot name="head">

                            <x-table.row>
                              <x-table.heading class="text-left">Category</x-table.heading>
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
                              <x-table.cell>{{$category->type}}</x-table.cell>
                              <x-table.cell>{{$category->status}}</x-table.cell>
                              <x-table.cell>
                                <x-button.link wire:click="edit({{ $category->id }})">Edit</x-button.link>
                              </x-table.cell>
                              <x-table.cell>
                                <x-button.link wire:click="edit({{ $category->id }})">Delete</x-button.link>
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
      <x-modal.dialog wire:model="showEditModal">
        <x-slot:title>Edit Category</x-slot>
        <x-slot:content></x-slot>
        <x-slot:footer>
          <x-button.secondary>Cancel</x-button.secondary>
          <x-button.primary>Save</x-button.primary>
        </x-slot>
      </x-modal.dialog>
    </div>
</x-app-layout>

