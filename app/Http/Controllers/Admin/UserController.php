<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$user=User::all();
        return view('admin.users.create');
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
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password' => 'required|confirmed',
            'thumbnail'=>'nullable|image',
        ]);

        $data = $request->all();

        $data['avatar'] = User::uploadImage($request);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'avatar'=> $data['avatar'],
        ]);

        //$post -> tags() ->sync($request->tags);

        return redirect()->route('users.index')->with('success','Пользователь добавлен');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
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
            'name'=>'required',
            //'email'=>'required|email|unique:users',
            'thumbnail'=>'nullable|image',
        ]);
        $data = $request->all();
        $user = User::find($id);
        if($request->hasFile('avatar')) {
            $data['avatar'] = User::uploadImage($request, $user->avatar);
        }
        $user->update($data);
        //$post -> tags() ->sync($request->tags);
        return redirect()->route('users.index')->with('success',"Пользователь обновлен");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user= User::find($id);
//        $post->tags()->sync([]);
        Storage::delete($user->avatar);
        $user->delete();
        return redirect()->route('users.index')->with('success',"Пользователь id:{$user->id}  \"{$user->name}\" удален");
    }
}
