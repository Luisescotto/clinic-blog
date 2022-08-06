<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');

    }

    public function index()
    {
        $posts = Post::get();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {

        $categories = Category::get();
        $tags = Tag::all();

        return view('admin.post.create',compact('categories', 'tags'));

    }

    public function store(Request $request, Post $post)
    {
        $post =    $post->my_store($request);

        return redirect()->route('posts.edit', $post);
    }

    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::where('categorizable_type', 'Post')->get();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        switch ($request->status) {
            case 'public':
                return
                $request->merge([
                    'published_at' => Carbon::now('America/Santo_Domingo'),
                ]);
                break;

            case 'hidden':
                return
                $request->merge([
                    'published_at' => null,
                ]);
                break;

            case 'draft':
                return
                $request->merge([
                    'published_at' => null,
                ]);
                break;

            case 'program':
                return
                $request->merge([
                    'published_at' => $request->published_at,
                ]);
                break;
            
            default:
                # code...
                break;
        }

        $post->my_update($request);
        return back();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function upload_image(Request $request, $id){
        
        $post = Post::findOrFail($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name); 
            $urlimage='/image/'.$image_name;           
        }

        $post->images()->create([
            'url' => $urlimage,
        ]);
    }
}
