<?php

namespace App\Http\Controllers\apis;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\address;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function addressByid($id)
    {

        $address = DB::table('address')->where('id', $id)->get();

        $data['status'] = 200;
        $data['data'] = $address;
        $data['message'] = "تم جلب الباينات بنجاح";

        return response()->json($data, 200);
    }

    public function addressByUserID($id)
    {

        $useraddress = DB::table('address')->where('user_id', $id)->get();

        $data['status'] = 200;
        $data['data'] = $useraddress;
        $data['message'] = "تم جلب الباينات بنجاح";

        return response()->json($data, 200);
    }
    public function saveAddress(Request $request)
    {

        $items = [];

        $address = new address();

        $address->user_id = $request->user_id;
        $address->new_address = $request->new_address;
        $address->area_id = $request->area_id;
        $address->lat = $request->lat;
        $address->long = $request->long;

//        if ($request->hasFile('image')) {
//            if ($request->file('image')->isValid()) {
//                try {
//                    $imageName = "ms" . time() . '.' . $request->image->getClientOriginalExtension();
//                    $request->image->move('files/addones_images' , $imageName);
//                    $address->image = $imageName;
//                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
//
//                }
//            }
//        }
        $address->save();


        $success['status'] = true;
        $success['data'] = $items;

        $success['message'] = 'user is registering';
        return response()->json($success, 200);
    }

}

