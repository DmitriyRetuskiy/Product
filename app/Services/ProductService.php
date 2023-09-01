<?php
namespace App\Services;

use App\Models\Products;
use Illuminate\Support\Facades\DB;


class ProductService
{
    // получение всех продуктов
    public static function getAllProducts()
    {

        $result = DB::table('products')
        ->select('products.id',
            'products.name','products.article',
            'products.status', 'products.color', 'products.size')
        ->get();

       return $result;
    }

    public static function getProdictById($id)
    {

        $result = DB::table('products')
            ->select('*')
            ->where('id', $id)
            ->first();

        return $result;
    }

    public static function updateProductById(object $objProduct)
    {

        $arrUpdate = [
            'article' => $objProduct->article,
            'name' => $objProduct->name,
            'color' => $objProduct->color];

        $status = $objProduct->status??'';

        if($status != ''){
            $arrUpdate = array_merge($arrUpdate,['status' => $objProduct->status]);
        }


        $res = DB::table('products')
            ->where(['id' => $objProduct->id])
            ->update($arrUpdate);

        return $res;
    }

    public static function userCheck(object $objUser)
    {
        $res = DB::table('roles')
            ->select('*')
            ->where(['login' => $objUser->login])
            ->value('role');

        return $res;
    }


}
