<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Area;
use App\Models\Group;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;


class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listUsers()
    {
        $users = Employee::paginate(10);
        return view('admin.employees.list', ['users' => $users]);
    }

    public function destroyEmployee($id)
    {
        $res = Employee::find($id);
        $res->delete();
        session()->flash('success', 'تم حذف المستخدم بنجاح');
        return redirect(route('Admin.listEmployees'));
    }
    public function ViewEmployee($id)
    {
        $user = Employee::find($id);
        return view('admin.employees.view', ['user' => $user]);
    }
    public function listEmployees()
    {
        $users = Employee::where('is_admin',1)->paginate(10);
        session()->flash('flag', 1);
        return view('admin.employees.list', ['users' => $users]);
    }
    public function ViewEditFormE($id)
    {
        $user = Employee::find($id);
        $areas = Area::all();
        $groups = Group::all();
        return view('admin.employees.edit', ['user' => $user, 'areas' => $areas, 'groups'=>$groups]);

    }
    public function EditEmployee($id, Request $request)
    {
        $user = Employee::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(isset($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->area_id = $request->area_id;
        $user->group_id = $request->group_id;
        $user->is_admin = 1;
        if ($request->hasFile('image')) {
                $imageName = rand(11111,99999) . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('files/user_images/'), $imageName);
                $user->image = $imageName;
        }
        $user->save();
        session()->flash('successM', 'تم تعديل المستخدم بنجاح');
        return redirect(route('Admin.listEmployees'));
    }
    public function StoreEmployee(Request $request)
    {
        $user = new Employee();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->area_id = $request->area;
        $user->group_id = $request->group;
        $user->is_admin = 1;
        if ($request->hasFile('image')) {
                $imageName = rand(11111,99999) . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('files/user_images/'), $imageName);
                $user->image = $imageName;
        }
        $user->save();
        session()->flash('successM', 'تم إضافة المستخدم بنجاح');
        return redirect(route('Admin.listEmployees'));

    }
//    public function destroyEmployee($id)
//    {
//        $res = Employee::find($id);
//        $res->delete();
//        session()->flash('success', 'تم حذف العضو بنجاح');
//        return redirect(route('Admin.listEmployees'));
//    }
//    public function ViewEmployee($id)
//    {
//        $user = Employee::find($id);
//        return view('admin.employees.view', ['user' => $user]);
//    }

    public function AddEmployee()
    {
        $areas = Area::all();
        $groups = Group::all();
        return view('admin.employees.create',['areas'=>$areas, 'groups'=>$groups]);
    }
}
