<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Employee;
class ProfileController extends Controller
{
    
    public function edit()
    {
        $res = Area::all();
        return view('admin.profile.edit', ['areas' => $res]);
    }
    public function updateUserProfile(Request $request)
    {  
        $res = Employee::find(auth()->user()->id);
        $res->name = $request->name;
        $res->email = $request->email;
        if ($request->hasFile('image')) {
            $imageName = rand(11111,99999) . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('files/user_images/'), $imageName);
            $res->image = $imageName;
        }
        $res->save();
        session()->flash('success', 'Information Edited Successfully.');
        return redirect(route('Admin.EditPersonalInformation'));
    }
}
