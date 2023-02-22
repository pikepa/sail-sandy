<div class='w-2/3 mt-6'>
    <form wire:submit.prevent="save">

        <input type='file' wire:model='photo'>
    
     
    
        @error('photo') <span class="error">{{ $message }}</span> @enderror
    
     
    
        <button type="submit" class="mt-4 p-4 rounded-lg bg-indigo-400 btn">Upload</button>
    
    </form>
</div>