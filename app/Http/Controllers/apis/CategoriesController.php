<?php

namespace App\Http\Controllers\apis;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    public function categoriesByid($id)
    {

        $categories = DB::table('categories')->where('id', $id)->get();

        $data['status'] = 200;
        $data['data'] = $categories;
        $data['message'] = "تم جلب الباينات بنجاح";

        return response()->json($data, 200);
    }

    public function categories()
    {

        $categories = DB::table('categories')->get();

        $data['status'] = 200;
        $data['data'] = $categories;
        $data['message'] = "تم جلب الباينات بنجاح";

        return response()->json($data, 200);
    }

}
