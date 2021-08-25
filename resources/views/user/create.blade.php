@extends('layouts.main-layout')


@section('content')
    <div class="container">
        <h2>Регистрация пользователя</h2>

        <form method="post" action="{{route('register.store')}}">
            @csrf

                <div class="form-group">
                    <label for="name">Your name</label>
                    <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" placeholder="Name ....." required>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Email ..... " required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password ..... " required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Password ..... " required>
                </div>
                <button type="submit" class="btn btn-primary">Зарегистрировать</button>
        </form>


    </div>
@endsection


