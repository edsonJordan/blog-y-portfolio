<?php

namespace App\Sysprivate;

use Illuminate\Support\Facades\Http;

class Youtubelink {
    private $api_key = "AIzaSyBplDOjfmXig5zMZmawAsC3j8BKqf6N9zc";
    private $chanel = "UCKE0n8MjLe4GftpkUEkcmRw";

    public function GetLink()
    {
        $video = Http::get("https://www.googleapis.com/youtube/v3/search?key="
         . $this->api_key . "&channelId=" 
         . $this->chanel . "&part=snippet,id&order=date&maxResults=5");
            $data=  $video->json();
            return $data['items'][0]['id']['videoId'];
    }
} 