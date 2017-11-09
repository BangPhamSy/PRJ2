<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Shop;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header_client',function($view){
         if(Auth::check()){
            $list_shop = Shop::where('user_id',Auth::User()->id)->get();
            $view->with('list_shop',$list_shop);
         }
        });
        view()->composer('header_shop',function($view){
           
            //$view->with('shop',$shop);
        });
       
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
