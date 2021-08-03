<?php

namespace App\Http\Controllers\apis;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\addones;

class AddonesController extends Controller
{

    public function Alladdones()
    {

        $addones = DB::table('addones')->get();

        $data['status'] = 200;
        $data['data'] = $addones;
        $data['message'] = "تم جلب الباينات بنجاح";

        return response()->json($data, 200);
    }

    public function saveAddones(Request $request)
    {

        $items = [];

        $addones = new addones();

        $addones->name = $request->name;
        $addones->price = $request->price;
        $addones->image = $request->image;

        $addones->status = $request->status;

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                try {
                    $imageName = "ms" . time() . '.' . $request->image->getClientOriginalExtension();
                    $request->image->move('files/addones_images' , $imageName);
                    $addones->image = $imageName;
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }
            }
        }
        $addones->save();


        $success['status'] = true;
        $success['data'] = $items;

        $success['message'] = 'user is registering';
        return response()->json($success, 200);
    }
}



