<div class="flex justify-between ">

    <div class="flex-1 mr-4 space-y-6">
        <!-- Post Title -->

        <x-input.group for="title" label="Title" width="full">
            <x-input.text wire:model='title' type="text" class="form-input w-full rounded" name="name">
            </x-input.text>
        </x-input.group>

        <!-- Post Body -->

        <x-input.group for="body" label="Body" width="full">
            <x-input.textarea wire:model='body' rows=10 type="text" />
        </x-input.group>

        <!-- Meta Description -->

        <x-input.group for="meta_description" label="Meta Description" width="full">
            <x-input.textarea wire:model='meta_description' rows=10 type="text" />
        </x-input.group>


    </div>
    <div class=" space-y-6">
        <!-- Post Category -->
        <div>
            <x-input.group for="category" label="Body" width="full">
                <livewire:forms.category-select wire:model='category_id' :cat_id="$selectedCategory" />
            </x-input.group>
        </div>

        <!-- Schedule Post -->

        <label class="block">
            <span class="text-gray-700  font-bold">Published </span>
            @if($published_at != null)
            <input wire:model='published_at' type="date" name="published_at" value="{{  $published_at  }}"
                class="form-input rounded mt-1 block w-full">
            @else
            <input wire:model='published_at' type="date" name="published_at" class="form-input rounded mt-1 block w-full">
            @endif
        </label>

        <!-- Checkbox for Featured Image-->
        <div>
            <x-input.group label="Featured Image" for="cover_image"></x-input.group>

            <img wire:model='cover_image' class='rounded shadow-lg' src="images/1.jpeg" width="250px" alt="Featured image">

        </div>

        <!-- this is the save button -->
        <div class="flex justify-between">
            <div>
                <button method="Submit" class="w-28 p-2 rounded-lg bg-green-500">
                    Save Post
                </button>
            </div>
            <div>
                <button method="Submit" class="w-28 p-2 rounded-lg bg-orange-500">
                    Preview Post
                </button>
            </div>
        </div>
    </div>
</div>