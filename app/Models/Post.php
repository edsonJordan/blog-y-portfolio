<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];
    use HasFactory;
    public function getRouteKeyName(){
        return 'slug';
    }
     /* Relation One to Many Inverse */
     public function user(){
        return $this->belongsTo(User::class);
    }
    /* Relation One to Many Inverse */
    public function category(){
        return $this->belongsTo(Category::class);
    }
    /* Relation One to One Polymorphic image - Post */
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
    /* Relation One to Many Polymorphic Post - Comments */
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function comment(){
        return $this->morphOne(Comment::class, 'commentable');
    }
    /* Relatiion Many to Many Polymorphic Post - Technology */
    public function technologies(){
        return $this->morphToMany(Technology::class, 'technologyable');
    }
}
