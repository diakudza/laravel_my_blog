<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index()
    {

        $posts = Post::with('category','tags')->orderBy('id', 'desc')->paginate(3);
        $lastPosts = Post::query('title')->orderBy('created_at', 'DESC')->limit(3)->get();
        return view('front.index', compact('posts', 'lastPosts'));
    }

    public function indexSearch(Request $request)
    {

        $request->validate(['searchInput'=>'required']);
        $searchItem = $request->searchInput;
        $posts = Post::with('category')->where('title','LIKE',"%{$searchItem}%")->orderBy('id', 'desc')->paginate(3);

        return view('front.index', compact('posts'));
    }
}
