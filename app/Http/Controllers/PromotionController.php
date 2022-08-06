<?php

namespace App\Http\Controllers;

use App\Product;
use App\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $promotions = Promotion::get();
        return view('admin.promotion.index', compact('promotions'));
    }

    public function create()
    {
        $products = Product::store_products()->get();
        return view('admin.promotion.create', compact('products'));

    }

    public function store(Request $request, Promotion $promotion)
    {
        $promotion->my_store($request);
        return redirect()->route('promotions.index');
    }

    public function show(Promotion $promotion)
    {
        return view('admin.promotion.show', compact('promotion'));
    }

    public function edit(Promotion $promotion)
    {
        $products = Product::store_products()->get();
        return view('admin.promotion.edit', compact('promotion', 'products'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $promotion->my_update($request);
        return redirect()->route('promotions.index');
    }

    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('promotions.index');
    }
}
