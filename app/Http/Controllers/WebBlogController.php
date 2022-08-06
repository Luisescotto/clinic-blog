<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebBlogController extends Controller
{
    public function blog(){
        $post_categories = Category::where('categorizable_type', 'Post')->get();
        $recent_posts = Post::latest('published_at')->where('status', 'Public')->take(3)->get();
        $post_tags = Tag::whereHas('taggables', function($query){
            $query->where('taggable_type', 'App\Post');
        })->get();


        $months= Post::where('status', 'Public')->select(
            DB::raw("count(*) as count"),
            DB::raw("DATE_FORMAT(published_at, '%M %Y') as date")
        )->groupBy('date')->get();
        
        $posts = Post::where('status', 'Public')->paginate(8);
        return view('web.blog', compact('posts', 'post_categories', 'recent_posts', 'post_tags', 'months'));

    }

    public function blog_details(Post $post){
        $post_categories = Category::where('categorizable_type', 'Post')->get();
        $recent_posts = Post::latest('published_at')->where('status', 'Public')->take(3)->get();
        $post_tags = Tag::whereHas('taggables', function($query){
            $query->where('taggable_type', 'App\Post');
        })->get();


        $months= Post::where('status', 'Public')->select(
            DB::raw("count(*) as count"),
            DB::raw("DATE_FORMAT(published_at, '%M %Y') as date")
        )->groupBy('date')->get();
        return view('web.blog_details', compact('post', 'post_categories', 'recent_posts', 'post_tags', 'months'));

    }

    public function get_posts_category(Category $category){

        $post_categories = Category::where('categorizable_type', 'Post')->get();
        $recent_posts = Post::latest('published_at')->where('status', 'Public')->take(3)->get();
        $post_tags = Tag::whereHas('taggables', function($query){
            $query->where('taggable_type', 'App\Post');
        })->get();


        $months= Post::where('status', 'Public')->select(
            DB::raw("count(*) as count"),
            DB::raw("DATE_FORMAT(published_at, '%M %Y') as date")
        )->groupBy('date')->get();
        $posts = $category->posts()->paginate(8);
        return view('web.blog', compact('posts', 'post_categories', 'recent_posts', 'post_tags', 'months'));
    }

    public function get_posts_tag(Tag $tag){

        $post_categories = Category::where('categorizable_type', 'Post')->get();
        $recent_posts = Post::latest('published_at')->where('status', 'Public')->take(3)->get();
        $post_tags = Tag::whereHas('taggables', function($query){
            $query->where('taggable_type', 'App\Post');
        })->get();


        $months= Post::where('status', 'Public')->select(
            DB::raw("count(*) as count"),
            DB::raw("DATE_FORMAT(published_at, '%M %Y') as date")
        )->groupBy('date')->get();
        $posts = $tag->posts()->paginate(8);
        return view('web.blog', compact('posts', 'post_categories', 'recent_posts', 'post_tags', 'months'));
    }

    public function get_posts_month($date){

        $olDate = strtotime($date);
        $newDate = date('m', $olDate);

        $posts = Post::where('status', 'Public')->whereMonth('published_at', $newDate)->paginate(8);
        
        $post_categories = Category::where('categorizable_type', 'Post')->get();
        $recent_posts = Post::latest('published_at')->where('status', 'Public')->take(3)->get();
        $post_tags = Tag::whereHas('taggables', function($query){
            $query->where('taggable_type', 'App\Post');
        })->get();


        $months= Post::where('status', 'Public')->select(
            DB::raw("count(*) as count"),
            DB::raw("DATE_FORMAT(published_at, '%M %Y') as date")
        )->groupBy('date')->get();
        
        return view('web.blog', compact('posts', 'post_categories', 'recent_posts', 'post_tags', 'months'));
    }

    public function posts_json(){
        $posts = Post::where('status', 'Public')->pluck('title');
        return $posts;
    }

    public function search_posts(Request $request){
        $post_categories = Category::where('categorizable_type', 'Post')->get();
        $recent_posts = Post::latest('published_at')->where('status', 'Public')->take(3)->get();
        $post_tags = Tag::whereHas('taggables', function($query){
            $query->where('taggable_type', 'App\Post');
        })->get();


        $months= Post::where('status', 'Public')->select(
            DB::raw("count(*) as count"),
            DB::raw("DATE_FORMAT(published_at, '%M %Y') as date")
        )->groupBy('date')->get();
        
        $posts = Post::where('status', 'Public')->where('title', 'LIKE', "%$request->search_words%")->paginate(8);

        if ($posts->count() == 1){
            foreach ($posts as $key => $post) {
                return redirect()->route('web.blog_details', $post);                
            }
        }else{
            return view('web.blog', compact('posts', 'post_categories', 'recent_posts', 'post_tags', 'months'));
        }
    }
}
