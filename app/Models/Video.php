<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

     /* Relation inverse User - Video  'One to Many'  */
     public function user(){
        return $this->belongsTo(User::class);
    }
    /* Relation One to Many Polymorphic Video - Comments */
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    /* Relatiion Many to Many Polymorphic Video - Technology */
    public function technologies(){
        return $this->morphToMany(Technology::class, 'technologyable');
    }
}
