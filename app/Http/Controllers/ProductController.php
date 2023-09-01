<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $objProduct = (object)$request->all();
        $objProduct->id = $id;
        $res = ProductService::updateProductById($objProduct);

        if($res) return \response()->redirectToRoute('products');

        return \response()->abort('404');
    }

    public function loginGet(Request $request): \Illuminate\Http\Response
    {
        Session::forget('login');
        return \response()->view('login');
    }

    public function loginPost(Request $request): \Illuminate\Http\RedirectResponse
    {
        $objUser = (object)$request->all();

        $validated = $request->validate([
            'login' => 'required|max:50',
            'password' => 'required'
        ]);

        $objUser = (object)$request->all();

        $res = ProductService::userCheck($objUser);

        if ($res) { // если авторизовались
            Session::put('login', 'admin');
            return \response()->redirectToRoute('products');
        }

        return \response()->redirectToRoute('login');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
