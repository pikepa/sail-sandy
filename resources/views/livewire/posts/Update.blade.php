<div>
        <x-forms.card title="Edit Post">
            <x-buk-form wire:submit.prevent="save">

                @include('livewire.posts.form', ['selectedCategory'=>$selectedCategory] )

            </x-buk-form>
    </x-forms.card>
</div>      