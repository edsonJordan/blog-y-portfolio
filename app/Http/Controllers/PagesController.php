<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class PagesController extends Controller{
    private $api_key = "AIzaSyBplDOjfmXig5zMZmawAsC3j8BKqf6N9zc";
    private $chanel = "UCKE0n8MjLe4GftpkUEkcmRw";
    public function home(){

        $video = Http::get("https://www.googleapis.com/youtube/v3/search?key="
         . $this->api_key . "&channelId=" 
         . $this->chanel . "&part=snippet,id&order=date&maxResults=5");
         
        $videos = $video->json();
        return view('pages.home', compact('videos'));
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