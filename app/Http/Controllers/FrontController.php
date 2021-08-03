<?php

namespace App\Http\Controllers;

use App\Models\addones;
use App\Models\AddonesOrder;
use App\Models\cart;
use App\Models\Order;
use App\Models\OrdersProducts;
use App\Models\Product;
use App\Models\Products_size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function registerandlogin(){
        return view('front.registerandlogin');
    }

    public function booking($prod_id){
        $addons = addones::where('status',1)->get();
        $product = Product::where('id',$prod_id)->first();
        $prod_size = Products_size::where('product_id',$prod_id)->get();

        return view('front.addons',compact(['addons','product','prod_size']));
    }
    public function savetocart(Request $request,$prod_id){
        //dd($request->input());
        $request->validate(['prod_size'=>"required"]);
        $cart = new cart();
        $cart->user_id = Auth::guard('customer')->user()->id;
        $cart->product_id = $prod_id;
        $cart->isAddon = 0;
        if($request->input('prod_size') != null){
            $cart->products_size = $request->input('prod_size');
        }else{
            $cart->products_size = Products_size::where('product_id',$prod_id)->first()->id;
        }
        $cart->price = $request->input('price_prod_hidden');
        $cart->name =  Product::where('id',$prod_id)->first()->name;
        $cart->quantity = $request->input('quantity');
        $cart->save();
        //if()
        foreach ($request->input('addon') as $key=>$value){
            if(array_key_exists('status',$value)){
                $cart = new cart();
                $cart->user_id = Auth::guard('customer')->user()->id;
                $cart->product_id = $value['id'];
                $cart->isAddon = 1;
                $cart->products_size = 0;
                $cart->price = $value['subtotal'];
                $cart->name =  addones::where('id',$value['id'])->first()->name;
                $cart->quantity = $value['qty'];
                $cart->save();
            }
        }
        return redirect(url('/'));

    }

    public function showcart(){
        $cart = cart::where('user_id',Auth::guard('customer')->user()->id)->where('isAddon',0)->get();
        $addons = cart::where('user_id',Auth::guard('customer')->user()->id)->where('isAddon',1)->get();

        return view('front.showcart' ,compact(['cart','addons']));
    }

    public function creatorder(Request $request){
        $total_Price = 0;
        foreach($request->input('prods') as $key => $value){
//            if(array_key_exists('id',$value)) {
//                $cart = cart::where('id', $value['id'])->first();
//            }
            //dd($value);
            $cart = cart::where('id', $value['id'])->first();
            //dd($value);
            $cart->user_id = Auth::guard('customer')->user()->id;
            $cart->product_id = $value['prod_id'];
            $cart->isAddon = 0;
            $cart->products_size = $value['prod_size'];
            $cart->price = $value['price_prod_hidden'];
            $total_Price += $value['price_prod_hidden'];
            $cart->name =  DB::table('products')->where('id',$value['prod_id'])->first()->name;
            $cart->quantity = $value['qty'];
            $cart->save();
        }
        foreach ($request->input('addon') as $key=>$value){
            if(array_key_exists('status',$value)){
//                if(array_key_exists('id',$value)) {
//                    $cart = cart::where('id', $value['id'])->first();
//                }
                //dd($value);
                $cart = cart::where('id', $value['id'])->first();
                $cart->user_id = Auth::guard('customer')->user()->id;
                //dd($value);
                $cart->product_id = $value['prod_id'];
                $cart->isAddon = 1;
                $cart->products_size = 0;
                $cart->price = $value['subtotal'];
                $cart->name =  DB::table('addones')->where('id',$value['prod_id'])->first()->name;
                $cart->quantity = $value['qty'];
                $total_Price +=  $value['subtotal'];
                $cart->save();
            }
        }
        $order = new Order();
        $order->user_id = Auth::guard('customer')->user()->id;
        $order->payment_method = 1;
        $order->delivery_method = 1;
        $order->name = Auth::guard('customer')->user()->name;
        $order->phone = Auth::guard('customer')->user()->phone;
        $order->price = $total_Price;
        $order->status = 1;
        $order->address_id = 1;
        if($order->save()){
            foreach($request->input('prods') as $key => $value){
                $item = new OrdersProducts();
                $item->order_id = $order->id;
                $item->product_id = $value['prod_id'];
                $item->product_size = $value['prod_size'];
                //dd($value['quantity']);
                $item->quantity = $value['qty'];
                $item->save();
            }
            foreach ($request->input('addon') as $key=>$value){
                $item = new AddonesOrder();
                $item->order_id = $order->id;
                $item->addon_id = $value['prod_id'];
                $item->quantity = $value['qty'];

                $item->save();
            }
        }

        return back()->with('successM',__('alert.checkout'));

    }
    public function deletecart($id){
        $cart = cart::destroy([$id]);
        return back()->with('SuccessM',__('alert.deletionisdone'));
    }
}
