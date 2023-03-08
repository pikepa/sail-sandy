<div class='mt-4 ml-4'>
    <form wire:submit.prevent="save">
        <div class="font-semibold text-xl pb-4">
            <label for="load_image">Choose an image to Upload:</label><br>
        </div>
        <div class="flex justify-left items-center">
            <div>
                <input type="file"
                name="load_image"
                wire:model='photo'>
                @error('photo') <span class="error">{{ $message }}</span> @enderror
            </div>
    
        
            @empty(!$photo)
            <div>
                <button type="submit" class="py-2 px-4 rounded-lg bg-indigo-400 btn">Upload</button>
            </div>
            @endempty
        </div>


    </form>
</div>