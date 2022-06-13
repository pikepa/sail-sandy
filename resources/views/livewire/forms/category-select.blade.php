<div>
    <select name="category_id" id="category_id" class="rounded">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
        <option value="{{$category->category_id}}">{{$category->name}}</option>
        @endforeach
    </select>

</div>