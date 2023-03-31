<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post;

class TextSearchController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('post_search')){
            $posts = Post::search($request->post_search)
                ->paginate(7);
        }else{
            $posts = Post::paginate(7);
        }
        return view('welcome', compact('posts'));
    }
    public function fullTextSearch(Request $request)
    {
        $this->validate($request,['title'=>'required']);
        $posts = Post::create($request->all());
        return back();
    }
}