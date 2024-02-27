<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function main()
    {
        return view('site.category.main');
    }
    public function make()
    {
        return view('site.category.make');
    }

    public function store(Request $request, Category $category)
    {
        $data = $request->all();
        $category = $category->create($data);
        return redirect()->route('category.main');
    }

    public function remove(string|int $id)
    {
        if(!$category = Category::find($id)){
            return back();
        }

        $category->delete();

        return redirect()->route('category.main');
    }

    public function list(Category $category)
    {
        $categories = $category->all();
        
        return view('site.category.list', compact('categories'));
    }
    
}
