<?php

namespace App\Http\Controllers\clients;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function category($id = null)
    {
        $cate = Category::find($id);

        $catePost = $cate->posts()->with('author', 'tags')->orderByDesc('id')->get();

        // dd($catePost);

        return view('clients.category.index', compact('cate', 'catePost'));
    }
}
