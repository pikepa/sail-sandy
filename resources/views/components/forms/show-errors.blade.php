<div class="p-2">
   <ul>
      @foreach ($errors->all() as $error)
      <li class="text-red-500 font-semibold">{{ $error }}</li>
      @endforeach
   </ul>
</div>