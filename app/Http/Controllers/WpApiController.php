<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\WpApi;
use Illuminate\Http\Request;

class WpApiController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $var = new WpApi;
        $posts = $var->importPosts();
        $count = Post::count();
    }
}
