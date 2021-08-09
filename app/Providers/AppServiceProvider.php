<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Observers\UserObserver;
use App\Observers\PostObserver;
use App\Observers\CategoryObserver;

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
        Paginator::defaultView('pagination::view');
        Category::observe(CategoryObserver::class);
        Post::observe(PostObserver::class);
        User::observe(UserObserver::class);
    }
}
