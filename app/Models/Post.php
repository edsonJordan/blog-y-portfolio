<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
     /* Relation One to Many Inverse */
     public function user(){
        return $this->belongsTo('App\Model\User');
    }
    /* Relation One to Many Inverse */
    public function category(){
        return $this->belongsTo('App\Model\Category');
    }
    /* Relation One to One Polymorphic image - Post */
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
    /* Relation One to Many Polymorphic Post - Comments */
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
    /* Relatiion Many to Many Polymorphic Post - Technology */
    public function technologies(){
        return $this->morphToMany('App\Models\Technology', 'technologyable');
    }
}
