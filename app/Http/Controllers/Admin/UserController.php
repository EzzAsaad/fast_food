<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Area;
use App\Models\Group;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listUsers()
    {
        $users = User::paginate(10);
        return view('admin.users.list', ['users' => $users]);
    }

    public function destroyUser($id)
    {
        $res = User::find($id);
        $res->delete();
        session()->flash('success', 'تم حذف المستخدم بنجاح');
        return redirect(route('Admin.listUsers'));
    }
    public function ViewUser($id)
    {
        $user = User::find($id);
        return view('admin.users.view', ['user' => $user]);
    }
    public function listEmployees()
    {
        $users = Employee::where('is_admin',1)->paginate(10);
        session()->flash('flag', 1);
        return view('admin.users.list', ['users' => $users]);
    }
    public function ViewEditForm($id)
    {
        $user = User::find($id);
        $areas = Area::all();
        $groups = Group::all();
        return view('admin.users.edit', ['user' => $user, 'areas' => $areas, 'groups'=>$groups]);

    }
    public function EditUser($id, Request $request)
    {
        $user = User::find($id);
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
        if ($request->hasFile('image')) {
                $imageName = rand(11111,99999) . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('files/user_images/'), $imageName);
                $user->image = $imageName;
        }
        $user->save();
        session()->flash('success', 'تم تعديل المستخدم بنجاح');
        return redirect(route('Admin.listUsers'));
    }
    public function StoreUser(Request $request)
    {
        $user = new Employee();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->area_id = $request->area;
        $user->group_id = $request->group;
        if ($request->hasFile('image')) {
                $imageName = rand(11111,99999) . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('files/user_images/'), $imageName);
                $user->image = $imageName;
        }
        $user->save();
        session()->flash('success', 'تم إضافة المستخدم بنجاح');
        return redirect(route('Admin.listUsers'));

    }
    public function destroyEmployee($id)
    {
        $res = Employee::find($id);
        $res->delete();
        session()->flash('success', 'تم حذف العضو بنجاح');
        return redirect(route('Admin.listUsers'));
    }
    public function ViewEmployee($id)
    {
        $user = Employee::find($id);
        return view('admin.users.view', ['user' => $user]);
    }

    public function AddUser()
    {
        $areas = Area::all();
        $groups = Group::all();
        return view('admin.users.create',['areas'=>$areas, 'groups'=>$groups]);
    }
}
