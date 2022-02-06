<?php

namespace App\Providers;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrap();
        View::share(['categories'=> Category::all(),'tags'=>Tag::all(),"lastPosts"=>Post::query('title')->orderBy('created_at','DESC')->limit(3)->get()]);

    }
}
