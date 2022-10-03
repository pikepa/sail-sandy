<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ShowCategoryPosts extends Component
{
    use WithPagination;

    public $category;

    public function mount($cat_slug)
    {
        $this->category = Category::where('slug', $cat_slug)->first();
    }

    public function render()
    {
        if (Auth::check()) {
            return view(
                'livewire.posts.show-category-posts',
                ['posts'=> Post::with('author')->where('category_id', $this->category->id)
                        ->orderBy('published_at', 'desc')->paginate(12), ]
            );
        } else {
            return view(
                'livewire.posts.show-category-posts',
                ['posts'=> Post::published()->with('author')->where('category_id', $this->category->id)
                        ->orderBy('published_at', 'desc')->paginate(12), ]
            );
        }
    }
}
