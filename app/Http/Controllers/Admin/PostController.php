<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::paginate(10);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('title','id')->all();
        $tags=Tag::pluck('title','id')->all();
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'content'=>'required',
            'category_id'=>'required|integer',
            'thumbnail'=>'nullable|image',
        ]);

        $data = $request->all();

        if($request->hasFile('thumbnail')){

            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("img/{$folder}");
        }

        $post = Post::create($data);
        $post -> tags() ->sync($request->tags);

        return redirect()->route('posts.index')->with('success','Статья добавлена');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        return view('admin.posts.edit',compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
        ]);

        $post = Post::find($id);
        $oldPost=$post->title;
        $post->update($request->all());
        return redirect()->route('posts.index')->with('success',"Статья id:{$post->id} \"{$oldPost}\" переименована в \"{$post->title}\" ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success',"Статья id:{$post->id}  \"{$post->title}\" удалена");
    }
}
