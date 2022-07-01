<div class="flex justify-between ">

    <div class="flex-1 mr-4 space-y-6">
        <!-- Post Name -->
        <x-input.group for="name" label="Category" width="full">
            <x-input.text wire:model='name' type="text" class="form-input w-full rounded">
            </x-input.text>
        </x-input.group>

        <!-- Post Slug -->
        <x-input.group for="slug" label="Slug" width="full">
            <x-input.text wire:model='slug' type="text" readonly class="form-input w-full rounded" value="{{$slug}}">
            </x-input.text>
        </x-input.group>


        <!-- Category Type -->
        <div>
            <x-input.group for="type" label="Type" width="full">
                <select wire:model="type" class="w-full text-lg rounded">
                    <option value=''>Select Type</option>
                    <option value="main">Main Menu </option>
                    <option value="gen">General Classification </option>
                </select>   
     </x-input.group>
        </div>
     
        <!-- Category Status -->
        <div>
            <x-input.group for="status" label="Active Status" width="full">
                <input wire:model='status' type="checkbox" class="ml-2" > 
            </x-input.group>
        </div>

        <!-- this is the save button -->
        <div class="flex justify-around">
            <div>
                <button method="Submit" class="w-28 p-2 rounded-lg bg-green-500">
                    Save Post
                </button>
            </div>

            <div>
                <button wire:click='cancel' class="w-28 p-2 rounded-lg bg-orange-500">
                    Cancel
                </a>
                </button>
            </div>
        </div>

    </div>
</div>