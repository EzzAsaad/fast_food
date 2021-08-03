<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function listCategories(){
        $categories = DB::table('categories')->where('main_category',"=",0)->get();
        return view('admin.category.index',compact('categories'));
    }

    public function deleteCategory($id){
        $category = DB::table('categories')->where('id','=',$id)->delete();
        $category = DB::table('categories')->where('main_category','=',$id)->delete();
        return redirect(route('Admin.ViewAllCategories'));
    }

    public function createCategory(){
        return view('admin.category.create');
    }

    public function storeCategory(Request $request){
       // dd(count(array(\request()->input('subcode.*'))));
       //   dd(count(array(\request()->input('subcode.*'))));
        $request->validate(['nameEn'=>'required','nameAr'=>'required','status'=>'required',
            'code'=>'required|unique:categories','substatus.*'=>'required']);
        $category = new Categorie();
        $category->name = json_encode(array("ar"=> \request()->input('nameAr'),
                            "en"=>\request()->input('nameEn')));
        $category->status = \request()->input('status');
        $category->code = \request()->input('code');
        $category->main_category = 0;

        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                $validate = $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);
                $imageName = rand(111111,999999). '_' . time() . '.'.$request->file('image')->getClientOriginalExtension();
                $request->image->move('files/categories_images/',  $imageName);
                $category->image = 'files/categories_images/'.$imageName;
            }
        }

        $cats = Categorie::all();
        if($cats->isEmpty()){
            $category->id=1;
        }
        $category->save();

        if($request->has('add_sub_cat')) {
            $lastID = DB::table('categories')->latest()->first();
                foreach ($request->input('subcat')as$key=>$value) {
                    //dd($value);
                    $subcategory = new Categorie();
                    $subcategory->name = json_encode(array("ar" => $value['namear'],
                        "en" => $value['nameen']));
                    $subcategory->status = $value['status'];
                    $subcategory->code = $value['code'];
                    $subcategory->main_category = $lastID->id;
//                    if($value->hasFile('image')){
//                        if($value['image']->file('image')->isValid()){
//                            $imageName = rand(111111,999999). '_' . time() . '.'.$value['image']->file('image')->getClientOriginalExtension();
//                            $request->image->move('files/categories_images/',  $imageName);
//                            $category->image = 'files/categories_images/'.$imageName;
//                        }
//                    }
                    $subcategory->save();
                }
            }

        return redirect(route('Admin.ViewAllCategories'))->with('successM', __('alert.CreationisDone!'));
    }

    public function showCategory($id){
        $category = Categorie::find($id);
        $suCategories = DB::table('categories')->where('main_category',"=",$id)->get();
        return view('admin.category.show',compact(['category','suCategories']));
    }

    public function updateCategory($id){
        $category = Categorie::find($id);
        $suCategories = DB::table('categories')->where('main_category',"=",$id)->get();
        return view('admin.category.update',compact(['category','suCategories']));
    }

    public function editCategory(Request $request){
        $request->validate(['nameEn'=>'required','nameAr'=>'required','status'=>'required',
            'code'=>'required']);
        $category = Categorie::find($request->input('id'));
        $category->name = json_encode(array("ar"=> \request()->input('nameAr'),
            "en"=>\request()->input('nameEn')));
        $category->status = \request()->input('status');
        $category->code = \request()->input('code');
        $category->main_category = 0;

        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                $validate = $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);
                $imageName = rand(111111,999999). '_' . time() . '.'.$request->file('image')->getClientOriginalExtension();
                $request->image->move('files/categories_images/',  $imageName);
                $category->image = 'files/categories_images/'.$imageName;
            }
        }

        $cats = Categorie::all();
        if($cats->isEmpty()){
            $category->id=1;
        }
        $category->save();


        $lastID = DB::table('categories')->latest()->first();
        if(is_array($request->input('substatus'))) {
            for ($i = 0; $i < count($request->input('substatus')); $i++) {
                if ($i < count($request->input('subCategory_id'))) {
                    if (!isset($request->input('subCategory_id')[$i]) || $request->input('subCategory_id')[$i] == null || $request->input('subCategory_id')[$i] == "") {
                        $subcategory = new Categorie();
                    } else {
                        $subcategory = Categorie::find($request->input('subCategory_id')[$i]);
                    }
                }
                $subcategory->name = json_encode(array("ar" => \request()->input('subnamear')[$i],
                    "en" => \request()->input('subnameen')[$i]));
                $subcategory->status = \request()->input('substatus')[$i];
                $subcategory->code = \request()->input('subcode')[$i];
                $subcategory->main_category = $lastID->id;
                $subcategory->save();
            }
        }

        return redirect(route('Admin.ViewAllCategories'))->with('successM', __('alert.CreationisDone!'));
    }

    public function deleteSub($id){
        $subCategory = Categorie::destroy([$id]);
        return response()->json(array('msg'=> $msg), 200);
    }

}
