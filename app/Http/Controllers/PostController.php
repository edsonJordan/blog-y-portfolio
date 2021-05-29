<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

class PostController extends Controller
{
    // public function index()
    public function index(){
        $categories = Category::all();
        $posts = Post::where('status', 2)->latest('id')->paginate(8);
    
        return view('blog.post.index', compact('posts', 'categories') );
    }

    public function show(Post $post){
        $similares = Post::where('category_id', $post->category_id)
                    ->where('status', 2)
                    ->where('id', '!=', $post->id)
                    ->latest('id')
                    ->get();
        $comments = Comment::where('commentable_id', $post->id)
                            ->where('commentable_type', Post::class)
                            ->latest('id')
                            ->get();
        return view('blog.post.show', compact('post', 'similares', 'comments'));
    }
    public function category(Category $category){
        $posts = Post::where('category_id', $category->id)
                                    ->where('status', 2)
                                    ->latest('id')    
                                    ->paginate(6);
        return view('blog.post.category', compact('category', 'posts'));
    }
}
