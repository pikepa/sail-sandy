<div>
        <x-forms.card title="Edit Post">
            <form wire:submit.prevent="update({{ $this->post_id }})">

                @include('livewire.posts.form', ['selectedCategory'=>$selectedCategory] )

            </form>
    </x-forms.card>
</div>      