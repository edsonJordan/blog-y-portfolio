<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
      
        //dd($categories[0]->name);
        return view('livewire.navigation');
    }
}
