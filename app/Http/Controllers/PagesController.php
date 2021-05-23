<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class PagesController extends Controller{

    public function index(){
        return view('pages.index');
    }
    public function portfolio(){
        return view('pages.portfolio');
    }
    public function about(){
        return view('pages.about');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function blog(){
        return view('blog.posts.index');
    }
}