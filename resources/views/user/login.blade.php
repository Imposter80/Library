@extends('layouts.main-layout')


@section('content')
    <div class="container">
        <h2>Войти</h2>

        <form method="post" action="{{route('login')}}">
            @csrf

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Email ..... " required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password ..... " required>
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>


    </div>
@endsection

