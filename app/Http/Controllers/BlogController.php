<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 2)->latest('id')->paginate(8);
        return view('blog.posts.index', compact('posts'));
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
        return view('blog.posts.show', compact('post', 'similares', 'comments'));
    }
}
