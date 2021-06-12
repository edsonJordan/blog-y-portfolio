<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request, Post $post)
    {
        $this->authorize('published', $post);
        $carbon = Carbon::now();
        $minute = $carbon->minute;
        $similares = Post::where('category_id', $post->category_id)
                    ->where('status', 2)
                    ->where('id', '!=', $post->id)
                    ->latest('id')
                    ->get();
        $comments = Comment::where('commentable_id', $post->id)
                            ->where('commentable_type', Post::class)
                            ->latest('id')
                            ->get();

        $commentario = Comment::create($request->all());

        return redirect()->route('blog.post.show', compact('post', 'similares', 'comments', 'minute'));
    }
    public function update(Request $request,  Post $post, Comment $comment){
        $this->authorize('published', $post);
        $carbon = Carbon::now();
        $minute = $carbon->minute;
        $similares = Post::where('category_id', $post->category_id)
                    ->where('status', 2)
                    ->where('id', '!=', $post->id)
                    ->latest('id')
                    ->get();
        $comments = Comment::where('commentable_id', $post->id)
                            ->where('commentable_type', Post::class)
                            ->latest('id')
                            ->get();

        $comment->update($request->all());
        return redirect()->route('blog.post.show', compact('post', 'similares', 'comments', 'minute'));
    }
    public function storevideo(Request $request, Video $video){
        $request->validate([
            'message' => 'required'
        ]);
        Comment::create($request->all());
        
        $similares = Video::where('status', 2)
        ->where('user_id', '=', $video->user->id)
        ->where('id', '!=', $video->id)
        ->latest('id')
        ->get();
            $comments = Comment::where('commentable_id', $video->id)
                            ->where('commentable_type', Video::class)
                            ->latest('id')
                            ->get();

        //return view('blog.video.show', compact('video','similares', 'comments'));
        
        return redirect()->route('blog.video.show', compact('video','similares', 'comments'));
    }
    public function updatevideo(Request $request,  Video $video, Comment $comment){
        $request->validate([
            'message' => 'required',
        ]);
        $similares = Video::where('status', 2)
        ->where('user_id', '=', $video->user->id)
        ->where('id', '!=', $video->id)
        ->latest('id')
        ->get();
            $comments = Comment::where('commentable_id', $video->id)
                            ->where('commentable_type', Video::class)
                            ->latest('id')
                            ->get();
        $comment->update($request->all());
        return redirect()->route('blog.video.show', compact('video','similares', 'comments'));
    }
}
