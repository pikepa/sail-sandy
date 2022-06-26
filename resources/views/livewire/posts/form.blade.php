<div class="flex justify-between ">

    <div class="flex-1 mr-4 space-y-6">
        <!-- Post Title -->
        <x-input.group for="title" label="Title" width="full">
            <x-input.text wire:model='title' type="text" class="form-input w-full rounded" name="name">
            </x-input.text>
        </x-input.group>
 
        <!-- Post Body -->

        <x-input.group for="body" label="Body" width="full">
            <x-input.rich-text wire:model.lazy='body' :initial-value=$body unique="body" type="text" />
        </x-input.group>

        <!-- Meta Description -->

        <x-input.group for="meta_description" label="Meta Description" width="full">
            <x-input.rich-text wire:model.lazy='meta_description' :initial-value="$meta_description" unique='meta' type="text" />
        </x-input.group>



    </div>
    <div class=" space-y-6">
        <!-- Post Category -->
        <div>
            <x-input.group for="category" label="Catgory" width="full">
                <livewire:forms.category-select  :cat_id="$selectedCategory" />
            </x-input.group>
        </div>

        <!-- Post is in the Vault -->
        <div>
            <x-input.group for="is_in_vault" label="Post is in our Vault" width="full">
                <input wire:model='is_in_vault' type="checkbox" class="ml-2" > 
            </x-input.group>
        </div>

        <!-- Schedule Post -->

        <label class="block">
            <span class="text-gray-700  font-bold">Published </span>
            <input wire:model='published_at' type="text" placeholder="DD-MM-YYYY" name="published_at" class="form-input rounded mt-1 block w-full">
        </label>

        <!-- Checkbox for Featured Image-->
        <div>
            <x-input.group label="Featured Image" for="cover_image"></x-input.group>

            <img class='rounded shadow-lg' src="{!!$cover_image!!}" width="250px" alt="Featured image">
        </div>
        <div>
            <input wire:model='newImage' type="file"/>

        </div>

        <!-- this is the save button -->
        <div class="flex justify-around">
            <div>
                <button method="Submit" class="w-28 p-2 rounded-lg bg-green-500">
                    Save Post
                </button>
            </div>

            <div>
                <button class="w-28 p-2 rounded-lg bg-orange-500">
                    <a href="{!!route('posts.index')!!}">
                    Cancel
                </a>
                </button>
            </div>
        </div>

    </div>
</div>