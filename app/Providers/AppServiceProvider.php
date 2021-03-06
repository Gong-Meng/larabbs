<?php

namespace App\Providers;

use App\Models\Topic;
use App\Models\Reply;
use App\Observers\TopicObserver;
use App\Observers\ReplyObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //注册观察器
        Topic::observe(TopicObserver::class);
        Reply::observe(ReplyObserver::class);

        //判断是否是开发环境
        if (app()->isLocal()) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }

    }
}
