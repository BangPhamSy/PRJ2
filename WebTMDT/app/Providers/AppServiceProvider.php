
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Shop;
use App\Loaisanpham;
use App\Sanpham;
use Cart;
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
        view()->composer('layout_shop.header_shop',function($view){
           
            $loaisp = Loaisanpham::all();
            $view->with('loaisp',$loaisp);
        });
        view()->composer('sidebar_client',function($view){
            $sanpham = Sanpham::all();
            $view->with('sanpham',$sanpham);
        });
        view()->composer('sidebar_client',function($view){
            $loaisanpham = Loaisanpham::all();
            $view->with('loaisanpham',$loaisanpham);
        });
        view()->composer('header_client',function ($view){
            if(Auth::check()){
                 $giohang = Cart::count();
                $view->with('giohang',$giohang);
            }
           
        });
       view()->composer('sidebar_client',function($view){
            $thuonghieu = Sanpham::select('hangsx')->distinct()->get();
            $view->with('thuonghieu',$thuonghieu);
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
