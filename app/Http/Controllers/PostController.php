<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Technology;
use App\Models\Technologyable;
use Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{
    // public function index()
    public function index(){
        $technologies = Technology::all();
        $categories = Category::all();
        $posts = Post::where('status', 2)->latest('id')->paginate(8);
        return view('blog.post.index', compact('posts', 'categories', 'technologies') );
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
    public function technology(Technology $technology){
      //$commentable = $comment->commentable;
      /*/* whereHas('posts', function (Builder $query) {
        $query->where('status', 'like', 2);
    })
    -> */
    //$technologies = Technologyable::all();
    
    $technologies = Technologyable::with(['posts' => function($query) {
        $query->where('status', 2);
        }])->paginate(10);
   
        $posts = Post::all();
        return view('blog.post.technology', compact('technology', 'technologies', 'posts'));
    }
}
