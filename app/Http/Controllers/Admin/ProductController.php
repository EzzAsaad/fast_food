<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Products_size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function listProducts(){
        $Prod_Categ = DB::table('products')->join('categories','products.category','=','categories.id')
                        ->select('products.*','categories.name as catName')->get();
        return view('admin.product.index',compact('Prod_Categ'));
    }
    public function deleteProduct($id){
        $product = Product::destroy([$id]);
        return redirect(route('Admin.ViewAllProducts'));
    }

    public function createProduct(){
        $categories = Categorie::all();
        return view('admin.product.create',compact('categories'));
    }

    public function storeProduct(Request $request){
        $request->validate(['namear'=>"required",'nameen'=>"required",'code'=>'required','available'=>'required',
            'status'=>'required',"category"=>"required",'price'=>'required|numeric','new_price'=>'required|numeric',
            'quantity'=>'required|numeric','prodsize.*'=>'required']);
        $prod = new Product();
        $prod->quantity = \request()->input('quantity');
        $prod->name = json_encode([
            "ar"=>request()->input('namear'),"en"=>$request->nameen
        ]);
        $prod->code = request()->input('code');
        $prod->category = request()->input('category');
        $prod->status = request()->input('status');
        $prod->available = request()->input('available');
        $prod->price = $request->input('price');
        $prod->new_price = $request->input('new_price');
        if($request->has('slug'))
            $prod->slug=\request()->input('slug');
        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                $validate = $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);
                $imageName = rand(111111,999999). '_' . time() . '.'.$request->file('image')->getClientOriginalExtension();
                $request->image->move('files/products_images/',  $imageName);
                $prod->image = 'files/products_images/'.$imageName;
//                foreach($request->file('image') as $image) {
//                    $imageName = $addone->name . '_' . rand(111111, 999999) . '_' . time() . '.' . $image->getClientOriginalExtension();
//                    $image->move(public_path().'files/addones_images/', $imageName);
//                    $addone->image = $addone->image.'files/addones_images' . $imageName."|";
//                }
            }
        }

        if($prod->save()){
            foreach ($request->prodsize as $key=>$value) {
                //dd($value);
                $prodSize = new Products_size();
                $prodSize->product_id = $prod->id;
                $prodSize->size = json_encode(['ar'=>$value['namear'],'en'=>$value['nameen']]);
                $prodSize->price = $value['price'];
                $prodSize->quantity = $value['quantity'];
                $prodSize->save();
            }
        }
        return redirect(route('Admin.ViewAllProducts'));

    }

    public function showProduct($id){
        $Prod_Categ = DB::table('products')->join('categories','products.category','=','categories.id')
            ->where('products.id','=',$id)->select('products.*','categories.name as catName')->get()->first();
        $prod_size = Products_size::where('product_id',$id)->get();
        return view('admin.product.show',compact(['Prod_Categ','prod_size']));
    }

    public function updateProduct($id){
        $prod_size = Products_size::where('product_id',$id)->get();
        $product = Product::find($id);
        $categories = Categorie::all();
        return view('admin.product.update',compact(['product','categories','prod_size']));
    }

    public function editProduct(Request $request){
        $prod = Product::find(\request()->input('id'));
        $request->validate(['namear'=>"required",'nameen'=>"required",
            "slug"=>"required", 'code' => 'required', 'available' => 'required',
            'status' => 'required', "category" => "required",
            'quantity' => 'required|numeric','prodsize.*'=>'required','price'=>'required|numeric','new_price'=>'required|numeric']);

        $prod->quantity = \request()->input('quantity');
        $prod->name = json_encode([
            "ar"=>request()->input('namear'),"en"=>$request->nameen
        ]);
        $prod->code = request()->input('code');
        $prod->category = request()->input('category');
        $prod->status = request()->input('status');
        $prod->available = request()->input('available');
        $prod->price = $request->input('price');
        $prod->new_price = $request->input('new_price');
        if($request->has('slug'))
            $prod->slug=\request()->input('slug');
        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                $validate = $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);
                $imageName = rand(111111,999999). '_' . time() . '.'.$request->file('image')->getClientOriginalExtension();
                $request->image->move('files/products_images/',  $imageName);
                $prod->image = 'files/products_images/'.$imageName;
//                foreach($request->file('image') as $image) {
//                    $imageName = $addone->name . '_' . rand(111111, 999999) . '_' . time() . '.' . $image->getClientOriginalExtension();
//                    $image->move(public_path().'files/addones_images/', $imageName);
//                    $addone->image = $addone->image.'files/addones_images' . $imageName."|";
//                }
            }
        }

        if($prod->save()){
            //dd($request->prodsize);
            foreach ($request->prodsize as $key=>$value) {
                //dd($value);
                $prodSize = new Products_size();
                if(array_key_exists('id',$value)){
                    $prodSize = Products_size::where('id',$value['id'])->first();
                }

                //dd($prodSize);
                $prodSize->product_id = $prod->id;
                $prodSize->size = json_encode(['ar'=>$value['name_ar'],'en'=>$value['name_en']]);
                //dd($prodSize);
                $prodSize->price = $value['price'];
                $prodSize->quantity = $value['quantity'];
                $prodSize->save();
                //dd($prodSize);
            }
        }
        return redirect(route('Admin.ViewAllProducts'));
    }


}
