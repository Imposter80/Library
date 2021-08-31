<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">


    <title>MyLibrary</title>

</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    @auth

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('') }}">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('') }}">{{auth()->user()->name}}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('logout')}}">Выйти</a>
                        </li>

                        @if(Auth::user()->isAdmin)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin') }}">Admin</a>
                            </li>
                        @endif

                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="">About</a>
                    </li>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
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
<body>

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

<main>


</main>

</body>
</html>





