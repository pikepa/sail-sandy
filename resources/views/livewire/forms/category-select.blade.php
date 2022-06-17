<div>
    <select wire:model="category_id" class="w-full text-lg rounded">
        <option value=''>Select Category</option>
        @foreach ($categories as $category)
        <option value="{!! $category->id !!}" 
            {{$category->id === $category_id ? 'selected' :''}}>{{  $category->name }} </option>
        @endforeach
    </select>

</div>  