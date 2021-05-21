<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Sysprivate\Youtubelink;


class YouTubeUrlServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('youlink', Youtubelink::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
