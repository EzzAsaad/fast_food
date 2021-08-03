<?php

namespace App\Http\Controllers\apis;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Products_sizeController extends Controller
{

    public function products_sizeByid($id)
    {

        $products_size = DB::table('products_size')->where('id', $id)->get();

        $data['status'] = 200;
        $data['data'] = $products_size;
        $data['message'] = "تم جلب الباينات بنجاح";

        return response()->json($data, 200);
    }

    public function products_size_ByProductID($id)
    {

        $products_ID = DB::table('products_size')->where('product_id', $id)->get();

        $data['status'] = 200;
        $data['data'] = $products_ID;
        $data['message'] = "تم جلب الباينات بنجاح";

        return response()->json($data, 200);
    }
}



