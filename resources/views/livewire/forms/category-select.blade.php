<div>
    <select wire:model="category_id" class="rounded">
        <option value=''>Select Category</option>
        @foreach ($categories as $category)
        <option value="{!! $category->id !!}" 
            {{$category->id === $category_id ? 'selected' :''}}>{{  $category->name }} </option>
        @endforeach
    </select>

</div>  