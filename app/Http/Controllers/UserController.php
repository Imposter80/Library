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


    public function loginForm()                  // формa для входа
    {
        return view('pages.index');
    }
    public function login(LoginUserRequest $request)  // вход
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
    public function logout()           //выход
    {
        Auth::logout();
        return redirect()->route('pages.index');
    }

}
