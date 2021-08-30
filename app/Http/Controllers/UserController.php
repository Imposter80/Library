<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginUserRequest;
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
    public function store(CreateUserRequest $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        session()->flash('success' , 'Successful registration');
        Auth::login($user);
        return redirect('');

    }

    public function update(CreateUserRequest $request) {

    }

    public function loginForm()
    {
        return view('user.login');
    }
    public function login(LoginUserRequest $request)
    {
        if(Auth::attempt([
            'email'=>$request->get('email'),
            'password'=> $request->get('password'),
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
