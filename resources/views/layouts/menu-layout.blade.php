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
                    @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login.create')}}">Войти</a>
                        </li>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
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

