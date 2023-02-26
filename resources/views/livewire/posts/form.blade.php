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
                <x-input.rich-text wire:model.lazy='meta_description' :initial-value="$meta_description"
                    unique='meta' type="text" />
            </x-input.group>



        </div>
        <div class=" space-y-6">
            <!-- Post Category -->
            <div>
                <x-input.group for="category" label="Category" width="full">
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
    @if($post)
    <div>
        <div class="text-xl font-bold pt-2 pl-4 border-2 rounded-lg mt-2">
            Post Gallery
            <main class="flex flex-wrap py-4 -mx-2">
                <div>
                    @forelse($post->getMedia('photos') as $image)
                        <div class="w-1/3 px-2 py-2">
                            <div class="flex-1 overflow-hidden card">
                                <img height='50px' class="object-cover w-full rounded object-centre"
                                    src="{{ $image->getUrl() }} " alt="Thumbnail is Missing here">
                                <div class='flex justify-between mt-2 p4'>
                                    @auth
                                    <button wire:click='deleteImage({{ $image->id }}, "{{ $post->id  }}")'>
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button wire:click='makeFeatured("{{ $image->getUrl() }}")'>
                                        <i class="fas fa-bolt"></i>
                                    </button>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="pt-2">
                            There are no related image files
                        </div>
                    @endforelse
                </div>
            </main>
        </div>
    </div>
    @endif
</div>
