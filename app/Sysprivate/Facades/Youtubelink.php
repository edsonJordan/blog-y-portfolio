<?php

namespace App\Sysprivate\Facades;


use illuminate\Support\Facades\Facade;

class Youtubelink extends Facade{
    protected static function getFacadeAccessor(){
        return 'youlink';
    }

}