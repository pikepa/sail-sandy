<div>
    <x-forms.card title="Add Post">
        <form wire:submit.prevent="save">
 
            @include('livewire.posts.form')
      
        </form>
    </x-forms.card>
</div>
