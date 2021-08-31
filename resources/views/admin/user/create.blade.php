<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Admin</title>
</head>
<body>

<header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin') }}">Admin</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login.create')}}">{{auth()->user()->name}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">Выйти</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Users
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('adminregister.create')}}">Create</a>
                            <a class="dropdown-item" href="{{route('adminregister.list')}}">List users</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>

                </ul>


                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-warning" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    {{--    Вывод ошибок валидации --}}

    <div class="mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach

                </ul>
            </div>
        @endif
    </div>
</header>

</body>
<main>
    <div class="container">
        <h2>Регистрация пользователя</h2>

        <form method="post" action="{{route('adminregister.store')}}">
            @csrf


            <div class="form-group">
                <label for="name">Name</label>
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
</main>
</html>

