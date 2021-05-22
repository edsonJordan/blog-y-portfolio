<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class PagesController extends Controller{

    public function home(){
        return view('dashboard');
    }
    public function portfolio(){
        return view('dashboard');
    }
    public function about(){
        return view('dashboard');
    }
    public function contact(){
        return view('dashboard');
    }
    public function blog(){
        return view('dashboard');
    }
}