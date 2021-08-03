<?php

namespace App\Http\Controllers\apis;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\rate;

class RateController extends Controller
{
    public function saveRate(Request $request)
    {

        $items = [];

        $saveRate = new rate();

        $saveRate->user_id = $request->user_id;
        $saveRate->product_id = $request->product_id;
        $saveRate->rate = $request->rate;


        $saveRate->save();


        $success['status'] = true;
        $success['data'] = $items;

        $success['message'] = 'user is rating';
        return response()->json($success, 200);
    }
//    public function myCart($id)
//    {
//
//        $myCart = DB::table('cart')->where('id', $id)->get();
//
//        $data['status'] = 200;
//        $data['data'] = $myCart;
//        $data['message'] = "تم جلب الباينات بنجاح";
//
//        return response()->json($data, 200);
//    }

}
