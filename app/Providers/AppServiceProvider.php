<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Repositories\Eloquent\EloquentUser;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);

        $app = $this->app;

        //Install User Eloquent
        $app->bind('App\Repositories\Interfaces\UserInterface',function(){

          return new EloquentUser(

            new User

            );

        });


    }
}
