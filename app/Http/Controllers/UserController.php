<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function create()
    {
        return View('user.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' =>'required',
            'email' =>'required|email|unique:users',
            'password' =>'required|confirmed',
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
        ]  );
        session()->flash('success' , 'Successful registration');
        Auth::login($user);
        return redirect('');

    }

    public function loginForm()
    {
        return view('user.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' =>'required|email',
            'password' =>'required',
        ]);

        if(Auth::attempt([
            'email'=>$request->email,
            'password'=> $request->password,
        ]))
        {
            return redirect('');
        }
        return redirect()->back()->with('error' , 'Incorrect login or password');


    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.create');
    }

}