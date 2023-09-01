<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>


</head>
<body>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="product-form">
        <form action="/login" method="POST">

            <div class="form-group">
                <label for="exampleInputEmail1">логин</label>
                <input type="login" name="login" value="">
                <small class="form-text text-muted">Введите логин</small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Пароль</label>
                <input type="password" name="password" value="">
                <small class="form-text text-muted">Введите пароль</small>
            </div>

            <br />
            <br />
            <button type="submit" class="btn btn-primary">Авторизоваться</button>
            <a href="/products"><button type="button" class="btn btn-primary">Войти без регистрации</button></a>
        </form>
    </div>
</body>
</html>
