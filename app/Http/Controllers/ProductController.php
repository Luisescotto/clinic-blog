<?php

namespace App\Http\Controllers;

use App\Category;
use App\Guest;
use App\Provider;
use App\Product;
use App\Tag;
use Barryvdh\DomPDF\Facade as PDF;
use \Milon\Barcode\DNS1D;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Subcategory;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{

  
    public function __construct()
    {
        // $this->middleware('auth');
        

    }

    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {

        $categories = Category::where('categorizable_type', 'Product')->get();
        $providers = Provider::get();
        $guests = Guest::get();
        $tags = Tag::all();
        return view('admin.product.create',compact('categories', 'providers', 'guests', 'tags'));

    }

    public function store(StoreRequest $request, Product $product)
    {
        $product = $product->my_store($request);

        return redirect()->route('products.edit', $product);
    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::get();
        $providers = Provider::get();
        $guests = Guest::get();
        $tags = Tag::all();

        Alert::toast('Producto registrado', 'success');
        Alert::alert('Title', 'Message', 'success');


        return view('admin.product.edit', compact('product','categories', 'providers', 'guests', 'tags'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $product->my_update($request);
        Alert::toast('Producto registrado', 'success');
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function change_status(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update([
            'status' => $request->value,
        ]);
        return $request->value;
    }

    public function get_products_by_barcode(Request $request){
        if ($request->ajax()) {
            $products = Product::where('code', $request->code)->firstOrFail();
            return response()->json($products);
        }
    }
    
    public function get_products_by_id(Request $request){
        if ($request->ajax()) {
            $products = Product::findOrFail($request->product_id);
            return response()->json($products);
        }
    }
    
    public function print_barcode()
    {
        $products = Product::get();
        $pdf = PDF::loadView('admin.product.barcode', compact('products'));
        return $pdf->download('codigos_de_barras.pdf');
    }

    // public function upload_image(Request $request, $id){
        
    //     $product = Product::findOrFail($id);
    //     if($request->hasFile('image')){
    //         $file = $request->file('image');
    //         $image_name = time().'_'.$file->getClientOriginalName();
    //         $file->move(public_path("/image"), $image_name); 
    //         $urlimage='/image/'.$image_name;           
    //     }

    //     $product->images()->create([
    //         'url' => $urlimage,
    //     ]);
    // }
}
