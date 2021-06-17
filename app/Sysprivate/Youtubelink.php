<?php

namespace App\Sysprivate;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class Youtubelink {
    private $api_key = "AIzaSyBplDOjfmXig5zMZmawAsC3j8BKqf6N9zc";
    private $chanel = "UCKE0n8MjLe4GftpkUEkcmRw";

    public function GetLink()
    {
        $video = Http::get("https://www.googleapis.com/youtube/v3/search?key="
         . $this->api_key . "&channelId=" 
         . $this->chanel . "&part=snippet,id&order=date&maxResults=7");
            $data=  $video->json();
            return $data;
    }
    public function GetVideo($videoId = null)
    {
        $response = Http::get("https://www.googleapis.com/youtube/v3/videos?id=$videoId&key=$this->api_key&part=snippet");
        /* $video = Http::get("https://www.googleapis.com/youtube/v3/".
        "videos?id=".$videoId."&search?key="
         . $this->api_key . "&channelId="); */
        $data =  $response->json();
        return $data;
    
    }
} 