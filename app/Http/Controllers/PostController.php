<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Post;

use Illuminate\Http\Request;


class PostController extends Controller
{
    public function show(Request $request)
    {
        $post = Post::find($request->id);
        //        dd(Post::find(5)->comments);
        $post->view = ++$post->view;
        $post->update();

        return view('front.post',compact('post'));
    }
}
