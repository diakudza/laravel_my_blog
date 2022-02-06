<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index()
    {


        $posts = Post::orderBy('view','DESC')->get();
        $lastPosts=Post::query('title')->orderBy('created_at','DESC')->limit(3)->get();

        return view('front.index',compact('posts','lastPosts'));
    }
}
