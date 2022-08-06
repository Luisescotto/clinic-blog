<?php

namespace App\Http\Controllers;

use App\Post;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\datatables;
use App\Image;
use Intervention\Image\File;

class AjaxController extends Controller
{
    // public function get_subcategories(Request $request)
    // {
    //     if($request->ajax()){
    //         $subcategories = Subcategory::where('category_id', $request->category)->get();
    //         return response()->json($subcategories);
    //     }
    // }

    public function get_products_by_subcategory(Request $request)
    {
        if($request->ajax()){
            return datatables()->of(Product::where('category_id', $request->subcategory_id)->get())
            ->addColumn('btn', 'admin.category._actions')
            ->rawColumns(['btn'])
            ->toJson();

        }
    }

    public function upload_image(Request $request, $id){
            
        if($request->ajax()){
            $post = Post::find($id);
            
            $urlimages = [];
            $filesLink = array();
            if($request->hasFile('files')){
                $images=$request->file('files');
                foreach ($images as $key => $image) {
                    $nombre = time().'_'.$image->getClientOriginalName();
                    $ruta = public_path().'/image';
                    $image->move($ruta, $nombre); 
                    $urlimages[]['url']='/image/'.$nombre;
                    $url = '/image/'.$nombre;

                    array_push($filesLink, $url);
                }
            }
            $post->images()->createMany($urlimages);
            return $filesLink;
        }
    }

    public function upload_images_products(Request $request, $id){
        $request->validate([
            'files.*' => ['required']
        ]);
        if($request->ajax()){
            $product = Product::find($id);
            
            $urlimages = [];
            $filesLink = array();
            if($request->hasFile('files')){
                $images=$request->file('files');
                foreach ($images as $key => $image) {
                    $nombre = time().'_'.$image->getClientOriginalName();
                    $ruta = public_path().'/image';
                    $image->move($ruta, $nombre); 
                    $urlimages[]['url']='/image/'.$nombre;
                    $url = '/image/'.$nombre;

                    array_push($filesLink, $url);
                }
            }
            $product->images()->createMany($urlimages);
            return $filesLink;
        }
    }

    public function get_images($id){
        $post = Post::find($id);
        $images = $post->images->pluck('url');
        return response()->json($images);
    }

    public function file_delete(Request $request){
        $image = Image::find($request->key);
        if (\File::isFile(public_path().$image->url)) {
            \File::delete(public_path().$image->url);
        }
        $image->delete();
        return true;
    }

}
