<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\home\IndexController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 导航栏 
        View::share('top_val',0);
        // 显示导航菜单栏
        View::share('common_get_cates',IndexController::getCates());
        //分享栏目
        View::share('common_data_cates',IndexController::getPidCatesData());
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
