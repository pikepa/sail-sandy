<div class="space-y-6">
    
    <!-- Title -->

    <div>
        <x-buk-label for="title">title</x-buk-label>
        <x-buk-input wire:model="title" class="block w-full rounded" name="name" value=""></x-buk-input>
        <x-buk-error field="title" class="mt-2 text-red-500" />
    </div>

    <!-- Body -->
    <div>
        <x-buk-label for="body">Body</x-buk-label>
        <x-buk-textarea wire:model="body" class="block w-full rounded" name="body"
            value=""></x-buk-textarea>
        <x-buk-error field="body" class="mt-2 text-red-500" />
    </div>

    <!-- Post Category -->
    <div>
        <x-buk-label for="category" class="block "></x-buk-label>

        <livewire:forms.category-select wire:model='category_id' :cat_id="$selectedCategory" />

        <x-buk-error field="category_id" class="mt-2 text-red-500" />
    </div>



    <!-- Schedule Post -->

    <div>
        <x-buk-label class="block"  for="published_at">Scheduled</x-buk-label>
            
        <x-buk-pikaday wire:model='published_at' name="published_at" class="rounded" />

        <x-buk-error field="published_at" class="mt-2 text-red-500" />

    </div>

    <!-- Checkbox for featured -->
    <div>
        <x-buk-label class="mr-4" for="featured">Scheduled</x-buk-label>

        <x-buk-checkbox wire:model='featured' name="featured"/>

        <x-buk-error field="featured" class="mt-2 text-red-500" />

    </div>

    <!-- Meta Description -->

    <div>
        <x-buk-label for="meta_description">Meta Description</x-buk-label>
        <x-buk-textarea wire:model="meta_description" class="block w-full rounded" name="meta_description" id="meta_description"
            value=""></x-buk-textarea>
        <x-buk-error field="meta_description" class="mt-2 text-red-500" />
    </div>

    <!-- this is the save button -->
    <x-buk-form-button  method="Submit" class="p-4 rounded-lg bg-green-500">
        Save Post
    </x-buk-form-button>
</div>
