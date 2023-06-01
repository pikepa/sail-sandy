<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke(Request $request)
    {
        // $category = Category::where('slug', 'welcome')->first();

        // $post = Post::with('author')->whereCategory_id($category->id)->first();

        // return view('welcome', compact('post'));

        return redirect('/home');
    }
}
