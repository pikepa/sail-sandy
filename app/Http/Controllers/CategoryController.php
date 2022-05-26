<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $categories = Category::get();
        return view("categories.index",compact('categories'));
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|unique:categories',
            'status'   => 'required|integer|between:0,1'
        ]);

       $catin = Category::create($validated);
        
       $categories = Category::get();

        return view("categories.index",compact('categories'));
    }

    public function destroy(Category $category)
    {        

        $category->delete();

        return view("categories.index");
    }
}
