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
