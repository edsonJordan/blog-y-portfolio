<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'color'];

    public function getRouteKeyName(){
        return 'slug';
    }
    
    /* Relation One to Many Inverse */
    public function technologyables(){
        return $this->belongsTo(Technologyable::class);
    }
}
