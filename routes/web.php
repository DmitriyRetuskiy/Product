<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models as App;
use App\Services as Serv;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    return view('users', ['users' => App\User::all()]);
});


Route::get('/products', function () {
    $res = Serv\ProductService::getAllProducts();
    return view('products', ['products' => $res]);
})->name('products');

Route::get('/products/{id}', function ($id) {
    $res = Serv\ProductService::getProdictById($id);
    return view('products', ['prod_change' => $res]);
});


Route::post('/product/change/{id}', [ ProductController::class, 'update' ]);
Route::get('/login', [ ProductController::class, 'loginGet' ])->name('login');
Route::post('/login', [ ProductController::class, 'loginPost' ]);

