<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function show(User $user)
    {
        if(!Gate::allows('viewAny-category', $user)){
            abort(403);
        }

        $categories = Category::all();
        
        return response()->json($categories);
    }

    public function create(Request $request, Category $category, User $user)
    {
        if(!Gate::allows('create-category', $user)){
            abort(403);
        }

        $data = $request->post();
        $category = $category->create($data);

        if(!$category){
            return back()->json(['message' => 'Category create failed', 500]);
        }
        return response()->json(['message' => 'Category created successfuly', 201]);
    }

    public function remove(string|int $id, User $user)
    {
        if(!Gate::allows('delete-category', $user)){
            abort(403);
        }

        if(!$category = Category::find($id)){
            return back()->json(['message' => 'Category remove failed', 500]);
        }

        $category->delete();

        return response()->json(['message' => 'Category removed successfuly', 200]);
    }
}
