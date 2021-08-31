<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function list()                 // вывод всех пользователей
    {
        $users = User::all();
        return view('admin.user.list', compact('users'));
    }

    public function create()                                // вывод формы регистрации пользователя
    {
        return View('admin.user.create');
    }


    public function store(CreateUserRequest $request)      // регистрация пользователя
    {
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
        ]  );
        session()->flash('success' , 'Successful registration');
        //Auth::login($user);
        return redirect('admin/users');

    }

    public function edit($id)
    {
        $user = User::find($id);
        //dd($user);
        return view('admin.user.edit', compact('user'));
    }


    public function update( UpdateUserRequest $request , $id)    // изменение данных пользователя
    {
        $user = User::find($id);
        $user->update($request->all());
        session()->flash('success' , 'Successful update');
        return redirect('admin/users');

    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        session()->flash('success' , 'Successful user deletion');
        return redirect('admin/users');

    }


}
