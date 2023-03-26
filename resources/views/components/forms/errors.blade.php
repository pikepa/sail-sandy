@props(['errors'])
<div>

@if ($errors->{ $bag ?? 'default' }->any())

<div class="font-bold">
    <p>Whoops something went wrong!
    </p>
</div><div class="mb-4 rounded p-2 bg-red-200 text-red-700 font-bold border-red-700 border-solid border-2">
        <ul class="field list-reset">
        @foreach ($errors->{ $bag ?? 'default' }->all() as $error)
            <li class="text-sm text-red">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
</div>
