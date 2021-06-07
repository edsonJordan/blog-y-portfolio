<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Technology;
use Livewire\WithPagination;

class TechnologyIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search ;


    public function render()
    {
        $techonologies = Technology::paginate(8);
        return view('livewire.admin.technology-index', compact('techonologies'));
    }
}
