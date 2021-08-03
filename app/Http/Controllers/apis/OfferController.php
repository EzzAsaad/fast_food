<?php

namespace App\Http\Controllers\apis;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{

    public function offersByid($id)
    {

        $offers = DB::table('offers')->where('id', $id)->get();

        $data['status'] = 200;
        $data['data'] = $offers;
        $data['message'] = "تم جلب الباينات بنجاح";

        return response()->json($data, 200);
    }

    public function offers()
    {

        $offers = DB::table('offers')->get();

        $data['status'] = 200;
        $data['data'] = $offers;
        $data['message'] = "تم جلب الباينات بنجاح";

        return response()->json($data, 200);
    }



    public function products_offers($status)  // order view by  id//
    {

        $offers = DB::table('offers')->where('status', $status)->get();
        foreach ($offers as $order){
            $order->item = DB::table('products')->where('id', $order->product_id)->get();
//            $order->customer = DB::table('users')->where('id', $order->customer_id)->get();

        }
        $date['status'] = 200;
        $date['data'] = $offers;
        $date['message'] = "تم جلب الباينات بنجاح";

        return response()->json($date, 200);
    }

    public function products_offers_id($status,$id)  // order view by  id//
    {

        $offers = DB::table('offers')->where('id', $id)->where('status', $status)->get();
        foreach ($offers as $order){
            $order->item = DB::table('products')->where('id', $order->product_id)->get();
//            $order->customer = DB::table('users')->where('id', $order->customer_id)->get();

        }
        $date['status'] = 200;
        $date['data'] = $offers;
        $date['message'] = "تم جلب الباينات بنجاح";

        return response()->json($date, 200);
    }




}






//$order->addons = DB::table('orderaddons')->where('order_id', $order->id)->get();
//$order->addons = DB::table('bills')->where('id', $order->id)->get();
