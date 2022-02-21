<?php

namespace App\Providers;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;
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
     /*   if(Cache::has('')){

        }*/

        View::share(['categories'=> Category::all(),'tags'=>Tag::all(),"lastPosts"=>Post::query('title')->orderBy('created_at','DESC')->limit(3)->get()]);
          /*view()->composer('front.layouts.sidebar',function ($view){
              $view->
                with('categories',Category::all())->
                with('tags',Tag::all())->
                with('lastPosts',Post::query('title')->orderBy('created_at','DESC')->limit(3)->get());
          });*/
    }
}
