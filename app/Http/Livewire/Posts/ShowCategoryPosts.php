<?php

namespace App\Http\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

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
        return view('livewire.posts.show-category-posts', ['posts'=> Post::where('category_id', $this->category->id)
        ->orderBy('published_at', 'desc')->paginate(12), ]);
    }
}
