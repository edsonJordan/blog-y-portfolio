<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /* Relation One to Many inverse */
    public function user(){
        return $this->belongsTo(User::class);
    }
    /* Relation One to Many Comments => Video , Post */
    public function commentable(){
        return $this->morphTo();
    }
}
