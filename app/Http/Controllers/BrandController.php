<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\Brand\UpdateRequest;
use App\Http\Requests\Brand\StoreRequest;

class BrandController extends Controller
{
    
    public function index(){
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }
   
    public function create(){
        return view('admin.brand.create');
    }

    public function store(StoreRequest $request, Brand $brand){
        $brand->my_store($request);
        return redirect()->route('brands.index');
    }

    public function show(Brand $brand){
        return view('admin.brand.show', compact('brand'));
    }

    public function edit(Brand $brand){
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(UpdateRequest $request, Brand $brand){
        $brand->my_update($request);
        return redirect()->route('brands.index');
    }

    public function destroy(Brand $brand){
        $brand->delete();
        return redirect()->route('brands.index');
    }
}
