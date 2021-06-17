<?php

namespace App\Http\Livewire\Admin;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class VideosIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search ;

    public function updatingSearch(){
        $this->resetPage();
    }

    
    public function render()
    {
        $videos = Video::where('user_id', auth()            
                    ->user()
                    ->id)
                    ->where('tittle', 'like','%'.$this->search.'%')
                    ->paginate(4);
        return view('livewire.admin.videos-index', compact('videos'));
    }
}
