<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function main()
    {
        return view('site.user.main');
    }
    public function make()
    {
        return view('site.user.make');
    }

    public function store(Request $request, Category $category)
    {
        $data = $request->all();
        $category = $category->create($data);
        return redirect()->route('user.main');
    }
}
