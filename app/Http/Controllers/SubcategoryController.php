<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Subcategory\StoreRequest;
use App\Http\Requests\Subcategory\UpdateRequest;
use App\Subcategory;
use Illuminate\Http\Request;


class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
      
    }

    public function index()
    {
        $subcategories = Subcategory::get();
        return view('admin.subcategory.index', compact('subcategories'));
    }

    public function create()
    {
        return view('admin.subcategory.create');

    }

    public function store(StoreRequest $request, Subcategory $subcategory)
    {
        $subcategory->my_store($request);
        return back();
        // return redirect()->route('categories.index');
    }

    public function show(Subcategory $subcategory)
    {
        return view('admin.subcategory.show', compact('subcategory'));
    }

    public function edit(Category $category, Subcategory $subcategory)
    {
        return view('admin.subcategory.edit', compact('category','subcategory'));
    }

    public function update(UpdateRequest $request, Category $category, Subcategory $subcategory)
    {
        $subcategory->my_update($request);
        return redirect()->route('categories.show', $category);
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return back();
        // return redirect()->route('subcategories.index');
    }
}
