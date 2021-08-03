<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\addones;
use App\Models\AddonesOrder;
use App\Models\address;
use App\Models\Order;
use App\Models\OrdersProducts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderCotroller extends Controller
{
    public function listAllOrders(){
        $orders = DB::table('orders')->get();
        foreach ($orders as $order) {
            $order->item = DB::table('products_orders')->where('order_id', $order->id)->get();
            $order->customer = DB::table('users')->where('id', $order->user_id)->get()->first();
            $order->addons = DB::table('addones_order')->where('order_id', $order->id)->get();
//        $order->addons = DB::table('bills')->where('id', $order->id)->get();
        }
        return view('admin.order.index',compact('orders'));
    }

    public function deleteOrder($id){
        $order = Order::destroy([$id]);
        $items = DB::table('products_orders')->where('order_id',$id)->delete();
        $addons = DB::table('addones_order')->where('order_id', $id)->delete();

        return redirect(route('Admin.ViewAllOrders'))->with('successM',__('alert.deletiondone'));
    }
    public function createOrder(){
        $users = User::all();
        //$address = address::all();
        $products = Product::all();
        //$products = $products->keyBy('id')[5]['id'];
        $product_size = DB::table('products_size')->get();
        $addones =addones::all();
        return view('admin.order.create',compact(['users','products','addones','product_size']));
    }
    public function getaddresses($id){
        $user_addresses = DB::table('address')->where('user_id',$id)->get();
        return response()->json(array('addresses'=>$user_addresses),200);
    }

    public function getprodsize($id){
        $prodsizes = DB::table('products_size')->where('product_id',$id)->get();
        return response()->json(array('products_sizes'=>$prodsizes),200);
    }

    public function storeOrder(Request $request){
        $order = new Order();
        $order->user_id = $request->input('user_id');
        $order->payment_method = 1;
        $order->delivery_method = 1;
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->price = $request->input('price');
        $order->nots = $request->input('nots');
        $new_address = null;
        if($request->has('address')){
            $new_address = address::create([
                'user_id'=>$request->input('user_id'),
                'new_address'=>$request->input('address'),
                'area_id' => 1,
                'lat'=>0,
                'long'=>0
            ]);
            $order->address_id = $new_address->id;
        }else{
            $order->address_id = $request->input('address_id');

        }
        $order->ship_fees = $request->input('ship_fees');
        $order->status = 1;
        if($order->save()) {
            if ($request->input('prod_is_addons') == 1) {

                foreach ($request->products_orders as $key => $value){
                    //dd($value);
                    $item = new OrdersProducts();
                    $item->order_id = $order->id;
                    $item->product_id = $value['product_id'];
                    $item->product_size = $value['producsize'];
                    //dd($value['quantity']);
                    $item->quantity = $value['quantity'];
                    $item->save();
                }

            }

            if($request->addone_is_addons == 1){
                foreach ($request->addones_orders as $key => $value){
                    $item = new AddonesOrder();
                    $item->order_id = $order->id;
                    $item->addon_id = $value['addone_id'];
                    $item->quantity = $value['quantity'];

                    $item->save();
                }
            }
        }



        return redirect(route('Admin.ViewAllOrders'))->with('successM',__('alert.CreationisDone!'));

    }
}
