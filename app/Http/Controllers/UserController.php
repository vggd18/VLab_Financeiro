<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function main(Request $request)
    {
        $transactions = DB::table('transaction')
                                ->where('user', '=', $request)
                                ->get();
        
        return view('user.main', compact('request', 'transactions'));
    }

    public function create(Request $request, Category $category)
    {
        $categories = $category->all();
        
        return view('user.create', compact('request', 'categories'));
    }

    public function remove(Request $request, Category $category)
    {
        $transactions = DB::table('transaction')
                                ->where('user', '=', $request)
                                ->get();
        
        $categories = $category->all();

        return view('user.remove', compact('transactions', 'category'));
    }
}
