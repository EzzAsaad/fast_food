<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Orders_Drivers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    public function listAllDrivers(){
        $deliveries = Employee::where('is_admin','=',0)->get();
        return view('admin.deliveryagent.index',compact('deliveries'));
    }

    public function deleteDriver($id){
        $driver = Employee::destroy([$id]);
        return redirect(route('Admin.ViewAllDrivers'))->with('successM',"Deletion is Done");
    }

    public function createDriver(){
        $areas = Area::all();
        return view('admin.deliveryagent.create',compact('areas'));
    }

    public function storeDriver(Request $request){
        $validate = $request->validate(['name'=>'required|unique:employees'
            ,'email'=>'required|unique:employees|email:filter','phone'=>'required|numeric',
            'password'=>'required'
            ]);
        $user = new Employee();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->area_id = $request->area;
        $user->group_id = 1;
        if ($request->hasFile('image')) {
            $imageName = rand(11111,99999) . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('files/driver_images/'), $imageName);
            $user->image = $imageName;
        }
        $user->save();
        return redirect(route('Admin.ViewAllDrivers'))->with('successM','Creation is Done!');
    }

    public function showDriver($id){
        $emp = Employee::find($id)->first();
        return view('admin.deliveryagent.show',compact('emp'));
    }

    public function updateDriver($id){
        $emp = Employee::find($id)->first();
        $areas = Area::all();
        return view('admin.deliveryagent.update',compact(['emp','areas']));
    }

    public function editDriver(Request $request){
        $user = Employee::find($request->id)->first();
        if($user->email == $request->email){
            $validate = $request->validate(['name'=>'required'
                ,'email'=>'required|email:filter','phone'=>'required|numeric'
            ]);
        }else{
            $validate = $request->validate(['name'=>'required'
                ,'email'=>'required|unique:employees|email:filter','phone'=>'required|numeric'
            ]);
        }

        if($user->name == $request->name){
            $validate = $request->validate(['name'=>'required'
            ]);
        }else{
            $validate = $request->validate(['name'=>'required|unique:employees','password'=>'required','phone'=>'required|numeric',
            ]);
        }
        $validate = $request->validate(['address'=>'required']);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != ''){
            $user->password = Hash::make($request->password);
        }
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->area_id = $request->area;
        $user->group_id = 1;
        if ($request->hasFile('image')) {
            $imageName = rand(11111,99999) . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('files/driver_images/'), $imageName);
            $user->image = $imageName;
        }
        $user->save();
        return redirect(route('Admin.ViewAllDrivers'))->with('successM','Updating is Done!');

    }

    public function show_new_orders(){
        $orders = Order::where('status',1)->get();
        $drivers = Employee::where('is_admin',0)->get();
        return view('admin.deliveryagent.showneworders',compact(['orders','drivers']));
    }

    public function assign_orders(Request $request){
            //dd($request->input('orders'));
            foreach($request->input('orders') as $order){
                    $orders_drivers = new Orders_Drivers();
                    $orders_drivers->driver_id = $request->input('driver_id');
                    $orders_drivers->order_id = $order;
                    if($orders_drivers->save()) {
                        $orderObj = Order::where('id',$order)->first();
                        $orderObj->status = 2;
                        $orderObj->save();
                    }
            }
        return redirect(route('Admin.ViewAllDrivers'))->with('successM','Assgining is Done!');

    }

}
