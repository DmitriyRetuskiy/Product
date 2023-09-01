<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Products</title>
</head>

<body>

<h3 class="mb4" >{{isset($products)?'Products':'Change '}}</h3>

@if(Session::get('login')?'admin':'')

    &nbsp;&nbsp;<a href="/login" class="btn btn-primary">  Выйти </a>
@endif


   @if (isset($products))

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Артикул</th>
                <th scope="col">Наименование</th>
                <th scope="col">Цвет</th>
                <th scope="col">статус</th>
                <th scope="col">редактировать</th>
            </tr>
            </thead>
            <tbody>

            @foreach($products as $product)
                <tr>
                    <th scope="row"> {{ $product->article }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->color }}</td>
                    <td>{{ $product->status }}</td>
                    <td> <a href="/products/{{ $product->id}}" > редактировать </a></td>
                </tr>
            @endforeach

            </tbody>

        </table>

   @endif

    @if(isset($prod_change))


        <div class="product-form">

        <form action="/product/change/{{$prod_change->id}}" method="POST">

            <div class="form-group">
                <label for="exampleInputEmail1">Артикул</label>
                <input type="text" name="article" value="{{$prod_change->article}}">
                <small class="form-text text-muted">Введите артикул</small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Наименование</label>
                <input type="text" name="name" value="{{$prod_change->name}}">
                <small class="form-text text-muted">Введите наименование</small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Цвет</label>
                <input type="text" name="color" value="{{$prod_change->color}}" >
                <small class="form-text text-muted">укажите цвета</small>
            </div>

            {{-- если админ, то можем менять доступность товара --}}
            @if(Session::get('login')?'admin':'')
                <select class="form-control form-control-lg" name="status">
                    <option name="available" {{($prod_change->status=='available')?'selected':''}} >available</option>
                    <option name="unavailable" {{($prod_change->status=='unavailable')?'selected':''}}>unavailable</option>
                </select>
            @endif

            <br />
            <br />
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>

        </div>
    @endif


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
