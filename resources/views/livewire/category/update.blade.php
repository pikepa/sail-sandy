<div>
    <x-forms.card title="Edit Post">
        <x-forms.errors :errors="$errors"></x-forms.errors>
        <form wire:submit.prevent="update({{ $this->category_id }})">
    {{$this->category_id}}
            @include('livewire.category.form' )
        </form>
    </x-forms.card>
</div>