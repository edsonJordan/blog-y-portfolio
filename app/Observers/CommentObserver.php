<?php

namespace App\Observers;

use App\Models\Comment;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function creating(Comment $comment)
    {
        if(! \App::runningInConsole()){
            $comment->user_id = auth()->user()->id;
        }
       
    }

    public function deleting(Comment $comment)
    {
        /* if($comment->image){
            Storage::delete($post->image->url);
        } */
    }
}
