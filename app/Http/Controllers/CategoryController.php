<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Product;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    {
        $categories = Category::where('categorizable_type', 'Product')->orWhere('categorizable_type', 'Post')->simplePaginate(10);
        return view('admin.category.index', compact('categories'));
    }

    // public function index_post()
    // {
    //     $categories = Category::where('categorizable_type', 'Post')->get();
    //     return view('admin.category.index', compact('categories'));
    // }

    public function create()
    {
        $categories = Category::where('categorizable_type', 'Product')->get();
        return view('admin.category.create', compact('categories'));

    }

    public function store(StoreRequest $request, Category $category)
    {
        $type = $request->type;
        $category->my_store($request, $type);
        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        $products = $category->products;
        $subcategories = $category->subcategories;
        return view('admin.category.show', compact('category','subcategories','products'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $category->my_update($request);
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
