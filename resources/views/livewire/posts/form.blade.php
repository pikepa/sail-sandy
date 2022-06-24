<div class="flex justify-between ">

    <div class="flex-1 mr-4 space-y-6">
        <!-- Post Title -->
        <x-input.group for="title" label="Title" width="full">
            <x-input.text wire:model='title' type="text" class="form-input w-full rounded" name="name">
            </x-input.text>
        </x-input.group>
 
        <!-- Post Body -->

        <x-input.group for="body" label="Body" width="full">
            <x-input.rich-text wire:model.lazy='body' :initial-value=$body  type="text" />
        </x-input.group>

        <!-- Meta Description -->

        <x-input.group for="meta_description" label="Meta Description" width="full">
            <x-input.rich-text wire:model.lazy='meta_description' :initial-value="$meta_description" type="text" />
        </x-input.group>



    </div>
    <div class=" space-y-6">
        <!-- Post Category -->
        <div>
            <x-input.group for="category" label="Catgory" width="full">
                <livewire:forms.category-select wire:model='category_id' :cat_id="$selectedCategory" />
            </x-input.group>
        </div>

        <!-- Schedule Post -->

        <label class="block">
            <span class="text-gray-700  font-bold">Published </span>
            <input wire:model='published_at' type="text" placeholder="DD-MM-YYYY" name="published_at" class="form-input rounded mt-1 block w-full">
        </label>

        <!-- Checkbox for Featured Image-->
        {{$cover_image}}
        <div>
            <x-input.group label="Featured Image" for="cover_image"></x-input.group>

            <img class='rounded shadow-lg' src="{!!$cover_image!!}" width="250px" alt="Featured image">
        </div>
        <div>
            <input wire:model='newImage' type="file"/>

        </div>

        <!-- this is the save button -->
        <div class="flex justify-between">
            <div>
                <button method="Submit" class="w-28 p-2 rounded-lg bg-green-500">
                    Save Post
                </button>
            </div>

            <div>
                <button class="w-28 p-2 rounded-lg bg-orange-500">
                    <a href="posts/{{$slug}}">
                    Preview Post
                </a>
                </button>
            </div>
        </div>
        <div class="flex text-sm text-gray-600">
            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
              <span>Upload a file</span>
              <input id="file-upload" name="file-upload" type="file" class="sr-only">
            </label>
            <p class="pl-1">or drag and drop</p>
          </div>
    </div>
</div>