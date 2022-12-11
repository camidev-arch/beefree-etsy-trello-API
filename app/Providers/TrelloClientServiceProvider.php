<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Beefree\TrelloClient;

class TrelloClientServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('TrelloClient',function(){
            return new TrelloClient();
        });
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
