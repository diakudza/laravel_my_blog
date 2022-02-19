<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Post;

use App\Models\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function show($slug)
    {
        $user=User::all();
        $post = Post::where('slug', $slug)->with('comments')->firstOrFail();
        $comments = $post->comments->all();
        $post->view = ++$post->view;
        $post->update();

        return view('front.post', compact('post','comments','user'));
    }
}
