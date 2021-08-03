<?php

namespace App\Http\Controllers\apis;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cart;

class CartController extends Controller
{
    public function saveCart(Request $request)
    {

        $items = [];

        $saveCart = new cart();

        $saveCart->user_id = $request->user_id;
        $saveCart->product_id = $request->product_id;
        $saveCart->price = $request->price;
        $saveCart->name = $request->name;
        $saveCart->quantity = $request->quantity;
        $saveCart->products_size = $request->products_size;
        $saveCart->isAddon = $request->isAddon;

        $saveCart->save();


        $success['status'] = true;
        $success['data'] = $items;

        $success['message'] = 'user is registering';
        return response()->json($success, 200);
    }

    public function myCart($id)
    {

        $myCart = DB::table('cart')->where('user_id', $id)->get();

        $data['status'] = 200;
        $data['data'] = $myCart;
        $data['message'] = "تم جلب الباينات بنجاح";

        return response()->json($data, 200);
    }


    public function editCart(Request $request)
    {
        $cartId = $request->id;
        if (!empty($cartId) && $cartId != null) {
            $cart = Cart::find($cartId);
            if (isset($cart) && $cart != null) {
                if (isset($request->quantity)) {
                    $cart->quantity = $request->quantity;

                    if ($cart->save()) {
                        $data["status"] = 200;
                        $data["data"] = $cart;
                        $data['message'] = "تم التعديل";
                    } else {
                        $data["status"] = -1;
                        $data["data"] = null;
                        $data['message'] = "خطأ فى حفظ البيانات";
                    }
                } else {
                    $data["status"] = -1;
                    $data["data"] = null;
                    $data['message'] = "خطأ فى البيانات, الكمية";
                }
            } else {
                $data["status"] = -1;
                $data["data"] = null;
                $data['message'] = "لا يوجد بيانات فى العربة";
            }
        } else {
            $data["status"] = -1;
            $data["data"] = null;
            $data['message'] = "خطأ فى البيانات";
        }
        return json_encode($data);
    }

    public function DeleteCartByid($id)
    {


        $cart = Cart::find($id);
        if (isset($cart) && $cart != null) {
            $DeleteCart = DB::table('cart')->where('id', $id)->Delete();

            $data['status'] = 200;
            $data['data'] = $DeleteCart;
            $data['message'] = "تم خذف الباينات بنجاح";

        }else{
            $data['status'] = -1;
            $data['data'] = null;
            $data['message'] = "لا يوجد بيانات للحذف";
        }

        return response()->json($data, 200);
    }


    public function DeleteUserCartByid($id)
    {


        $cart =  DB::table('cart')->where('user_id', $id)->get();
        if (isset($cart) && $cart != null) {
            $DeleteCart = DB::table('cart')->where('user_id', $id)->Delete();

            $data['status'] = 200;
            $data['data'] = $DeleteCart;
            $data['message'] = "تم خذف الباينات بنجاح";

        }else{
            $data['status'] = -1;
            $data['data'] = null;
            $data['message'] = "لا يوجد بيانات للحذف";
        }

        return response()->json($data, 200);
    }

    
}




