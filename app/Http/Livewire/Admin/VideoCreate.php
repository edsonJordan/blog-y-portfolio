<?php

namespace App\Http\Livewire\Admin;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
class VideoCreate extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search = "wyPbbyKyiPw" ;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function addData(String $id = null)
    {
    //$slug = Str::slug($id);
    $data = app('youlink')->GetVideo($id);
    $video = new Video();
    $video->tittle = $data['items'][0]['snippet']['title'];
    $video->slug = Str::slug($data['items'][0]['snippet']['title']);
    $video->description = $data['items'][0]['snippet']['description'];
    $video->url = $id;
    $video->status= 1;
    $video->user_id= 1;
        $video->save();
     //return redirect()->route('admin.videos.show', $id);
     return redirect()->route('admin.videos.index');
    }
    public function render()
    {
        $pickId = substr($this->search, -11);
        $datos = app('youlink')->GetVideo($pickId);
       
        return view('livewire.admin.video-create',compact('datos'));
    }
}
