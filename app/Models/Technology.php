<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    
    /* Relation Many to Many inverse Polimorphic  Post - Technologyables */
    public function posts(){
        return $this->morphedByMany('App\Models\Post', 'technologyable');        
    }
    /* Relation Many to Many inverse Polimorphic  Video - Technologyables */
    public function videos(){
        return $this->morphedByMany('App\Models\Video', 'technologyable');        
    }
}
