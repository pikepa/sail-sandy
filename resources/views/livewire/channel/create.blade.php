<div>
    <x-forms.card title="Add Channel">
        <x-forms.errors :errors="$errors"></x-forms.errors>
        <form wire:submit.prevent="save">
 
            @include('livewire.channel.form')
      
        </form>
    </x-forms.card>
</div>
