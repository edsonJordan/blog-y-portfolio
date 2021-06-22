<?php

namespace App\Http\Livewire\Admin;

use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;


class VideoCreate extends Component
{
   public $user;

    public function __construct() {
    $this->user =  Auth::user()->id;
    
    }
    use WithPagination;
    protected $paginationTheme = "bootstrap";


    public $search = "wyPbbyKyiPw" ;

    public  $tittle, $slug, $description, $url, $user_id ;

    protected $rules = [
        'tittle' => 'required',
        'slug' => 'required|unique:videos',
        'description' => 'required',
        'url' => 'required'
    ];


    public function updatingSearch(){
        $this->resetPage();
    }
    public function submit()
    {
        $this->validate();
        /* Video::create([
            'tittle' => $this->tittle,
            'slug' => $this->slug,
            'description' => $this->description,
            'url' => $this->url,
            'status' => 2,
            'user_id' => $this->user,

        ]); */
        $video = new Video();
            $video->tittle = $this->tittle;
            $video->slug = $this->slug;
            $video->description = $this->description;
            $video->url =  $this->url;
            $video->status= 1;
            $video->user_id= $this->user;
            $video->save();
            session()->flash('info', 'El video se agrego con éxito');
            return redirect()->route('admin.videos.index');
    }
    public function addData(String $id = null)
    {

     //return redirect()->route('admin.videos.show', $id);
     session()->flash('info', 'El video se agrego con éxito');
     return redirect()->route('admin.videos.index');
    }

    public function render()
    {
        $pickId = substr($this->search, -11);
        $datos = app('youlink')->GetVideo($pickId);

        if (isset($datos['items'])) {
            $this->tittle = $datos['items'][0]['snippet']['title'];
            $this->description= $datos['items'][0]['snippet']['description'];
            $this->slug = Str::slug($datos['items'][0]['snippet']['title']);
            $this->url=$datos['items'][0]['id'];
            $this->status = 2;

        };
       
        //$this->tittle = $settings->tittle;
        return view('livewire.admin.video-create',compact('datos'));
    }
}
