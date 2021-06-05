<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technologyable extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    use HasFactory;

     /* Relation Many to Many inverse Polimorphic  Post - Technologyables */
    /* public function posts(){
        return $this->morphedByMany(Post::class, 'technologyable');        
    } */
    /* Relation Many to Many inverse Polimorphic  Video - Technologyables */
    /* public function videos(){
        return $this->morphedByMany(Video::class, 'technologyable');        
    } */

    /* Relation Many to Many inverse Polimorphic  Post - Technologyables */
    public function posts(){
        return $this->morphedByMany(Post::class, 'technologyable');        
    }
    /* Relation Many to Many inverse Polimorphic  Video - Technologyables */
    public function videos(){
        return $this->morphedByMany(Video::class, 'technologyable');        
    }

    /* Relation One to Many Technologyable - technology */
    public function technologies(){
        return $this->hasMany(Technology::class);
    }
  


}
