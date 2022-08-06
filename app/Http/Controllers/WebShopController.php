<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\DB;

class WebShopController extends Controller
{

    public function welcome(){
        $featured_products = Product::store_products()->withCount(['ratings as average_rating' => function($query){
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        }])->orderByDesc('average_rating')->take(8)->get();

        $new_products = Product::store_products()->latest()->take(6)->get();
        $sale_products = Product::store_products()->withCount(['order_details as order_count' => function($query) {
            $query->select(DB::raw('sum((quantity))'));

        }])->orderByDesc('order_count')->take(6)->get();

        $latest_posts = Post::where('status', 'Public')->latest()->take(3)->get();
        $most_viewed_products = Product::store_products()->orderBy('views', 'DESC')->take(6)->get();
        $products_offer = Product::store_products()->has('promotions')->take(6)->get(); 

        return view('welcome', compact('featured_products', 'new_products', 'sale_products', 'latest_posts','most_viewed_products','products_offer'));
    }

    public function product_details(Product $product){
        $product->views++;
        $product->save();
        $featured_products = Product::withCount(['ratings as average_rating' => function($query){
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        }])->orderByDesc('average_rating')->take(8)->get();
        return view('web.product_details', compact('product', 'featured_products'));
    }

    public function shop_grid(){
        $products = Product::store_products()->paginate(12);

        $featured_products = Product::withCount(['ratings as average_rating' => function($query){
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        }])->orderByDesc('average_rating')->take(8)->get();
        return view('web.shop_grid', compact('products', 'featured_products'));
    }

    public function products_json(){
        $products = Product::store_products()->pluck('name');
        return $products;
    }

    public function search_products(Request $request){

        $products = Product::store_products()->where('name', 'LIKE', "%$request->search_words%")->paginate(12);
        $featured_products = Product::withCount(['ratings as average_rating' => function($query){
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        }])->orderByDesc('average_rating')->take(8)->get();

        if ($products->count() == 1){
            foreach ($products as $key => $product) {
                return redirect()->route('web.product_details', $product);                
            }
        }else{
            return view('web.shop_grid', compact('products', 'featured_products'));
        }
    }

    public function get_products_category(Category $category){

        $products = Product::store_products()->whereHas('category', function ($query) use ($category){
            $query->whereIn('categories.id', $category->descendantsAndSelf()->select('id'));
        })->paginate(12);


        $featured_products = Product::withCount(['ratings as average_rating' => function($query){
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        }])->orderByDesc('average_rating')->take(8)->paginate(12);
        return view('web.shop_grid', compact('products', 'featured_products'));
    }

    public function get_products_tag(Tag $tag)
    {
        $products = $tag->products()->paginate(12);
        $featured_products = Product::withCount(['ratings as average_rating' => function($query){
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        }])->orderByDesc('average_rating')->take(8)->get();
        return view('web.shop_grid', compact('products', 'featured_products'));
    }

    
}
