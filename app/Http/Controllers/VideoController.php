<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Technology;
use App\Models\Technologyable;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::where('status', 2)->latest('id')->paginate(8);
        //$posts = Post::where('status', 2)->latest('id')->paginate(8);
        $technologies = Technology::all();
        return view('blog.video.index', compact('videos', 'technologies'));
    }

    public function show(Video $video){
        $similares = Video::where('status', 2)
                    ->where('user_id', '=', $video->user->id)
                    ->where('id', '!=', $video->id)
                    ->latest('id')
                    ->get();
        $comments = Comment::where('commentable_id', $video->id)
                            ->where('commentable_type', Video::class)
                            ->latest('id')
                            ->get();
        
        return view('blog.video.show', compact('video','similares', 'comments'));
    }
    public function technology(Technology $technology){
      $technologies = Technologyable::with(['videos' => function($query) {
          $query->where('status', 2);
          }])->get();
     
          return view('blog.video.technology', compact('technology', 'technologies'));
      }
}
