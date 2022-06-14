<div>
    <x-forms.card title="Add Post">
        <x-buk-form wire:submit.prevent="save">
 
            @include('livewire.posts.form')
      
        </x-buk-form>
    </x-forms.card>
</div>