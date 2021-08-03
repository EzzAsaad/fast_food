<?php

namespace App\Http\Controllers\apis;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AreasController extends Controller
{

    public function AreaByid($id)
    {

        $Areas = DB::table('areas')->where('id', $id)->get();

        $data['status'] = 200;
        $data['data'] = $Areas;
        $data['message'] = "تم جلب الباينات بنجاح";

        return response()->json($data, 200);
    }

    public function Areas()
    {

//        $users = DB::table('users')->first();
        $Areas = DB::table('areas')->get();


        $data['status'] = 200;
        $data['data'] = $Areas;
        $data['message'] = "تم جلب الباينات بنجاح";

        return response()->json($data, 200);
    }
}

