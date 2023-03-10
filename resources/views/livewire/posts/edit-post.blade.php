<div>

    <div>
        <div>
          @if (session()->has('message') && $showAlert = true)
          <x-forms.success />
          @endif
        </div>
      </div>
      
    <div class="px-2">
        <!-- This Section allows adding and update forms -->
    
            @include('livewire.posts.update')
    
        @auth
        @if($post_id)
            <livewire:images.upload :post_id="$post->id" />
        @endif
        @endauth
    
    </div>
  

 
</div>