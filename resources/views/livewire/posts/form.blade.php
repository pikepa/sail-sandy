<div>
    <div class="flex justify-between border-2 rounded-lg p-4">
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
                <x-input.rich-text wire:model.lazy='meta_description' :initial-value="$meta_description" unique='meta'
                    type="text" />
            </x-input.group>



        </div>
        <div class=" space-y-6">
            <!-- Post Category -->
            <div>
                <x-input.group for="category" label="Catgory" width="full">
                    <livewire:forms.category-select :cat_id="$selectedCategory" />
                </x-input.group>
            </div>

            <!-- Post is in the Vault -->
            <div>
                <x-input.group for="is_in_vault" label="Post is in our Vault" width="full">
                    <input wire:model='is_in_vault' type="checkbox" class="ml-2">
                </x-input.group>
            </div>

            <!-- Schedule Post -->

            <label class="block">
                <span class="text-gray-700  font-bold">Published </span>
                <input wire:model='published_at' type="text" placeholder="DD-MM-YYYY" name="published_at"
                    class="form-input rounded mt-1 block w-full">
            </label>

            <!-- Checkbox for Featured Image-->
            @isset($cover_image)
            <div>
                <x-input.group label="Featured Image" for="cover_image"></x-input.group>

                <img class='rounded shadow-lg' src="{!!$cover_image!!}" width="250px" alt="Featured image">
            </div>
            @endisset



            <!-- this is the save button -->
            @empty($newImage)
            <div class="flex justify-around">
                <div>
                    <button method="Submit" class="w-28 p-2 rounded-lg bg-green-500">
                        Save Post
                    </button>
                </div>

                <div>
                    <button wire:click='cancel' class="w-28 p-2 rounded-lg bg-orange-500">
                        Cancel
                    </button>
                </div>
            </div>
            @endempty

        </div>

    </div>

    <!-- This is the spot for the Post Gallery -->

    <div>
        <div class="text-xl font-bold pt-2 pl-4 bg-cyan-50">
            Post Gallery
        </div>
        @isset($mediaItems)


        <!-- <div class="border-2 p-4 rounded-lg mt-2 flex flex-row flex-wrap justify-between"> -->
        <div class="border-2 p-4 rounded-lg ">
            @empty($mediaItems)
            <div class="pt-2">
                There are no related image files
            </div>
            @endEmpty
            <div class="grid grid-cols-3 gap-2 ">
                @foreach($mediaItems as $item)
                <div class="mx-auto w-full rounded-lg border text-center">
                    <img class="rounded-t-lg object-cover object-centre w-full" src="{{$item->getFullUrl()}}"
                        style="height:325px" alt="{{$item->name}}">
                    <div class="px-4 mt-2 flex flex-row justify-between">
                        <button wire:click="make_featured('{{ $item->getFullUrl() }}')"><i
                                class="fa-solid fa-bolt-lightning"></i></button>
                        <button wire:click="deleteImage({{ $item->id }})"><i
                                class="fa-regular fa-trash-can"></i></button>
                    </div>
                </div>
                @endforeach

            </div>

        </div>


        @endisset
        @isset($post_id)
        <div class="">
            <div class="pt-4 ml-4">
                <input wire:model='newImage' type="file" />
            </div>
            <div class="mt-4 ml-4">
                <button class="w-28 p-2 rounded-lg bg-green-500 font-semibold" wire:click="storeFile">Upload</button>
            </div>
        </div>
        @endisset
    </div>
</div>