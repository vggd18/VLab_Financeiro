<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Mockery\Undefined;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        
        return response()->json($categories);
    }

    public function create(Request $request, Category $category)
    {


        $data = $request->all();
        $category = $category->create($data);

        if(!$category){
            return back()->json(['message' => 'Category create failed', 500]);
        }
        return response()->json(['message' => 'Category created successfuly', 201]);
    }

    public function remove(string|int $id)
    {
        if(!$category = Category::find($id)){
            return back()->json(['message' => 'Category remove failed', 500]);
        }

        $category->delete();

        return response()->json(['message' => 'Category removed successfuly', 200]);
    }
}
