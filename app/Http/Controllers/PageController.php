<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class PageController extends Controller{

    public function index(){
        return view('page.index');
    }
    public function portfolio(){
        return view('page.portfolio');
    }
    public function about(){
        return view('page.about');
    }
    public function contact(){
        return view('page.contact');
    }
    public function blog(){
       
       // return view('blog.posts.index', compact('posts'));

    }
}