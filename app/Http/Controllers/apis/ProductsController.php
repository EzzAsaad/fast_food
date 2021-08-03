<?php

namespace App\Http\Controllers\apis;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class  ProductsController extends Controller
{

    public function productsByid($id)
    {

        $products = DB::table('products')->where('id', $id)->get();

        $data['status'] = 200;
        $data['data'] = $products;
        $data['message'] = "تم جلب الباينات بنجاح";

        return response()->json($data, 200);
    }

    public function products()
    {

        $products = DB::table('products')->get();

        $data['status'] = 200;
        $data['data'] = $products;
        $data['message'] = "تم جلب الباينات بنجاح";

        return response()->json($data, 200);
    }

    public function products_category($id)
    {

        $products = DB::table('products')->where("category", $id)->get();

        $data['status'] = 200;
        $data['data'] = $products;
        $data['message'] = "تم جلب الباينات بنجاح";

        return response()->json($data, 200);
    }
}























