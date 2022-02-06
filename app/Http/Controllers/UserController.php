<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login()
    {
        return view ('user.login');
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->home();
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if ( Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ]) ){
            return redirect()->home();
        }
        session()->flash('fail','не верная пара логин/пароль');
        return redirect()->back();

    }

    public function create()
    {
       return view('user.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'avatar' => 'nullable|image'

        ]);

        if($request->hasFile('avatar')) {
            $date = date('Y-m-d');
            $avatar = $request->file('avatar')->store("img/{$date}");

        }else{
            $avatar='img/User.png';
        }

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            //'avatar'=> $avatar ?? null,
            'avatar'=> $avatar,
        ]);

        session()->flash('success','Пользователь зарегистрирован');

        Auth::login($user);

        return redirect()->home();

    }
}
