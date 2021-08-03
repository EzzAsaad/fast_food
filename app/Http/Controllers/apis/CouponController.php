<?php

namespace App\Http\Controllers\apis;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\coupons;

class CouponController extends Controller
{
    public function chakeCoupon($coupon_code,$user_id)
    {


        $coupon =  DB::table('coupons')->where('coupon_code', $coupon_code)->first();
        if (isset($coupon) && $coupon != null) {
            $users = DB::table('usersCoupons')->where('coupon_id', $coupon->id)->where('user_id', $user_id)->first();

            if (isset($users) && $users != null && count(array($users))>0) {

                $data['status'] = -1;
                $data['data'] = $users;
                $data['message'] = "لقد استخدمت هذا الكبون مسبقا";

            }else{
                $data['status'] = 200;
                $data['data'] = $coupon;
                $data['message'] = "هذا الكبون متاح";
            }

        }else{
            $data['status'] = -1;
            $data['data'] = null;
            $data['message'] = "لا يوجد هذا الكبون";
        }

        return response()->json($data, 200);
    }
    public function saveCoupon(Request $request)
    {

        $items = [];

        $coupons = new coupons();

        $coupons->user_id = $request->user_id;
        $coupons->coupon_id = $request->coupon_id;
        $coupons->status = 1;


        $coupons->save();


        $success['status'] = true;
        $success['data'] = $items;

        $success['message'] = 'Coupon is registering';
        return response()->json($success, 200);
    }
}
