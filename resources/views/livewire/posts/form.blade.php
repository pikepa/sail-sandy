<div class="space-y-6">

    <!-- Title -->

    <div>
        <x-buk-label for="title" class="text-gray-700 font-bold">title</x-buk-label>
        <x-buk-input wire:model="title" class="form-input block w-full rounded" name="name" value=""></x-buk-input>
        <x-buk-error field="title" class="mt-2 text-red-500" />
    </div>

    <!-- Body -->

    <div>
        <x-buk-label for="body" class="text-gray-700 font-bold">Body</x-buk-label>
        <x-buk-textarea wire:model="body" class="block w-full rounded" name="body" value=""></x-buk-textarea>
        <x-buk-error field="body" class="mt-2 text-red-500" />
    </div>

    <!-- Post Category -->
    <div>
        <x-buk-label for="category" class="block text-gray-700 font-bold"></x-buk-label>

        <livewire:forms.category-select wire:model='category_id' :cat_id="$selectedCategory" />

        <x-buk-error field="category_id" class="mt-2 text-red-500" />
    </div>

    <!-- Schedule Post -->

    <div class="field mb-6">
        <label class="block">
            <span class="text-gray-700 font-bold">Published </span>
            @if($published_at != null)
            <input wire:model='published_at' type="date" name="published_at" value="{{  $published_at  }}"
                class="form-input mt-1 block w-full">
            @else
            <input wire:model='published_at' type="date" name="published_at" class="form-input mt-1 block w-full">
            @endif
        </label>
    </div>

    <!-- Checkbox for featured -->
    <div>
        <x-buk-label class="mr-4 text-gray-700 font-bold" for="featured">Scheduled</x-buk-label>

        <x-buk-checkbox wire:model='featured' name="featured" />

        <x-buk-error field="featured" class="mt-2 text-red-500" />

    </div>

    <!-- Meta Description -->

    <div>
        <x-buk-label for="meta_description" class="text-gray-700 font-bold">Meta Description</x-buk-label>
        <x-buk-textarea wire:model="meta_description" class="block w-full rounded" name="meta_description"
            id="meta_description" value=""></x-buk-textarea>
        <x-buk-error field="meta_description" class="mt-2 text-red-500" />
    </div>

    <!-- this is the save button -->
    <div>
        <x-buk-form-button method="Submit" class="MT-4 p-4 rounded-lg bg-green-500">
            Save Post
        </x-buk-form-button>
    </div>
</div>