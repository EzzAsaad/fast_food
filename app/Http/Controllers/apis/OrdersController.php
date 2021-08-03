<?php

namespace App\Http\Controllers\apis;
use App\Models\UsersModel;
use App\Models\order;
use App\Models\OrdersProducts;
use App\Models\AddonesOrder;
use App\Models\User;
use App\Models\Chat;
use App\Models\notify;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Validation\input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UserController;

class  OrdersController extends Controller
{
    public function orders($status,$id)
    {

        $orders = DB::table('orders')->where('status', $status)->where('user_id', $id)->get();
        foreach ($orders as $order) {
            $order->item = DB::table('products_orders')->where('order_id', $order->id)->get();
            $order->customer = DB::table('users')->where('id', $order->user_id)->get();
            $order->addons = DB::table('addones_order')->where('order_id', $order->id)->get();
//        $order->addons = DB::table('bills')->where('id', $order->id)->get();
        }
        $data['status'] = 200;
        $data['data'] = $orders;
        $data['message'] = "تم جلب الباينات بنجاح";

        return response()->json($data, 200);
    }
    public function order_byid($status, $id)
    {

        $orders = DB::table('orders')->where('id', $id)->where('status', $status)->get();
        foreach ($orders as $order) {
            $order->item = DB::table('products_orders')->where('order_id', $id)->get();
            $order->customer = DB::table('users')->where('id', $order->user_id)->get();
            $order->addons = DB::table('addones_order')->where('order_id', $order->id)->get();
//        $order->addons = DB::table('bills')->where('id', $order->id)->get();
        }
        $data['status'] = 200;
        $data['data'] = $orders;
        $data['message'] = "تم جلب الباينات بنجاح";

        return response()->json($data, 200);
    }

    public function saveOrder(Request $request)
    {

        $items = [];

        $order = new Order();
        $order->user_id = $request->user_id;
        $order->payment_method = $request->payment_method;
        $order->delivery_method = $request->delivery_method;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->price = $request->price;
        $order->nots = $request->nots;
        $order->address_id = $request->address_id;
        $order->ship_fees = $request->ship_fees;
        $order->status = 0;

        if($order->save()) {




            foreach (json_decode($request->products_orders) as $orderItem){


                if($orderItem->is_addons) {
                    $item = new OrdersProducts();
                    $item->order_id = $order->id;
                    $item->product_id = $orderItem->product_id;
                    $item->product_size = $orderItem->product_size;
                    $item->quantity = $orderItem->quantity;
                    $item->save();

                }
            }
                    foreach (json_decode($request->addones_order) as $orderItem){


                if($orderItem->is_addons){
                    $item = new AddonesOrder();
                    $item->order_id = $order->id;
                    $item->addon_id = $orderItem->addon_id;
                    $item->quantity = $orderItem->quantity;

                    $item->save();

                }

            }

        }

        $success['status'] = true;
        $success['data'] = $order;

        $success['message'] = 'order is registering';
        return response()->json($success, 200);
    }


}

