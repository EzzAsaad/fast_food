<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\addones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Sodium\add;

class AddonController extends Controller
{
    public function listAddons()
    {
        $adons = addones::all();
        //dd($adons->count());
        return view('admin.addone.index', ['adons'=> $adons]);
    }

    public function ChangeStatus($id){
        $addon = addones::find($id);
        if($addon->status == 0) {
            $addon->status = 1;
        }
        else{
            $addon->status = 0;
        }
        $addon->save();
        return redirect(route("Admin.ViewAllAddons"));
    }

    public function deleteAddone($id){
        $addone = addones::destroy([$id]);
        return redirect(route("Admin.ViewAllAddons"));
    }

    public function create(){
        return view('admin.addone.create');
    }
    public function store(Request $request){
        $_validated = $request->validate(['namear'=>"required",'nameen'=>"required","status"=>"required","price"=>"required|numeric"]);
        $addone = new addones();
        $addone->name = json_encode([
            "ar"=>request()->input('namear'),"en"=>$request->nameen
        ]);
        $addone->price = request()->input('price');
        $addone->status = request()->input('status');
        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                $validate = $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);
                $imageName = rand(111111,999999). '_' . time() . '.'.$request->file('image')->getClientOriginalExtension();
                $request->image->move('files/addone_images/',  $imageName);
                $addone->image = 'files/addone_images/'.$imageName;
//                foreach($request->file('image') as $image) {
//                    $imageName = $addone->name . '_' . rand(111111, 999999) . '_' . time() . '.' . $image->getClientOriginalExtension();
//                    $image->move(public_path().'files/addones_images/', $imageName);
//                    $addone->image = $addone->image.'files/addones_images' . $imageName."|";
//                }
            }
        }
        $addone->save();
        return redirect(route('Admin.ViewAllAddons'))->with('successM','Creation Process is Done!');


    }

    public function update($id){
        $addone = addones::find($id);
        return view('admin.addone.update',compact('addone'));
    }

    public function edit(Request $request){
        $addone = addones::find(request()->input('id'));
        $_validated = $request->validate(['namear'=>"required",'nameen'=>"required","status"=>"required","price"=>"required|numeric"]);
        $addone->name = json_encode([
            "ar"=>request()->input('namear'),"en"=>$request->nameen
        ]);
        $addone->price = request()->input('price');
        $addone->status = request()->input('status');
        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                $validate = $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);
                $imageName = rand(111111,999999). '_' . time() . '.'.$request->file('image')->getClientOriginalExtension();
                $request->image->move('files/addone_images/',  $imageName);
                $addone->image = 'files/addone_images/'.$imageName;
//                foreach($request->file('image') as $image) {
//                    $imageName = $addone->name . '_' . rand(111111, 999999) . '_' . time() . '.' . $image->getClientOriginalExtension();
//                    $image->move(public_path().'files/addones_images/', $imageName);
//                    $addone->image = $addone->image.'files/addones_images' . $imageName."|";
//                }
            }
        }
        $addone->save();
        return redirect(route('Admin.ViewAllAddons'));


    }
    public function show($id){
        $addone = addones::find($id);
        return view('admin.addone.show',compact('addone'));
    }


}
