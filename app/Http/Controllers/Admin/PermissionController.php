<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Group;
use App\Models\permissionGroup;
class PermissionController extends Controller
{
    public function add(){
        
        $controllers = Permission::getControllersNames();
       // $methods = Permission::getMethodsByControllerName('PermissionController');
        return view('admin.permission.add',compact('controllers'));
    }
    public function getMethods($name)
    {
        $methods = Permission::getMethodsByControllerName($name);
        return $methods;
    }
    public function store(Request $request)
    {
        $name = $request->name;
        $name2 = $request->anotheName;
        $controller = $request->controller;
        $method = $request->methods;
        $status = $request->status;
        Permission::create([
            'name' => $name,
            'breifName' => $name2,
            'ControllerName' => $controller,
            'MethodName' => $method,
            'status' => $status
        ]);
        session()->flash('success', 'تم إضافة الصلاحية بنجاح');
        return redirect(route('Admin.GetAllPermissions'));
    }

    public function listPermissions()
    {
        $permission = Permission::all();
        return view('admin.permission.index', ['permissions'=> $permission]);
    }
    public function destroy($id)
    {
        $per = Permission::find($id);
        $per->delete();
        session()->flash('success', 'تم حذف الصلاحية بنجاح');
        return redirect(route('Admin.GetAllPermissions'));
    }
    public function edit($id)
    {
        $user_info = Permission::find($id);
        $controllers = Permission::getControllersNames();
        $methods = Permission::AllMethods();

        return view('admin.permission.edit',['permission' => $user_info, 'controllers'=>$controllers, 'methods' => json_decode($methods)]);
    }
    public function update(Request $request, $id)
    {
        $p = Permission::find($id);
        $name = $request->name;
        $name2 = $request->anotheName;
        $controller = $request->controller;
        $method = $request->methods;
        $status = $request->status;

        $p->name = $name;
        $p->breifName =$name2;
        $p->ControllerName = $controller;
        $p->MethodName = $method;
        $p->status = $status;
        $p->save();
        session()->flash('success', 'تم تعديل الصلاحية بنجاح');
        return redirect(route('Admin.GetAllPermissions'));
    }

    public function AddGroup()
    {
        return view('admin.permission.addGroup');
    }

    public function EditGroup($id)
    {
        return view('admin.permission.addGroup', ['group' => Group::find($id)]);
    }
    public function storeGroup(Request $request)
    {
        Group::create([
            'name' =>$request->name,
            'description' => $request->Desc,
            'status' => $request->status
        ]);
        session()->flash('success', 'تم إضافة الجروب بنجاح');
        return redirect(route('Admin.AddGroup'));
    }
    public function viewGroups()
    {
        return view('admin.permission.viewGroups', ['groups' => Group::all()]);
    }
    public function AddPermissionToGroup()
    {
        $groups = Group::all();
        $permissions = Permission::all();
        return view('admin.permission.addPermissionToGroup', ['groups'=>$groups, 'permissions' => $permissions]);
    }

    public function EditGroupPermission($id)
    {
        $group = Group::find($id);
        $permissions = Permission::all();
        return view('admin.permission.addPermissionToGroup', ['group_id'=> $id, 'permissions' => $permissions]);

    }
    public function ViewPermissionFroGroup($id)
    {
        $res = Group::find($id);
        $permissions = $res->permissions;
        return view('admin.permission.index', ['permissions'=> $permissions]);
    }

    public function StorePermissionToGroup(Request $request)
    {
        $g_id = $request->name;
        foreach($request->permission as $p)
        {
            permissionGroup::create([
                'group_id' => $g_id,
                'permission_id' => $p
            ]);
        }
        
        session()->flash('success', 'تم تعيين الصلاحية للجروب بنجاح');
        return redirect(route('Admin.AddPermissionToGroup'));

    }

}
