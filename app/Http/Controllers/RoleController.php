<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
                                'name'=>'required',
                                'permissions'=>'required|array'
                            ],
                            [
                                'name'=>' عنوان المشروع مطلوب ',
                                'permissions'=>'لابد من اختيار صلاحيه على الاقل '
                            ]);
        // if(in_array($request->permissions,$request) == false)
        // {
        //     toastr()->error(' لابد من اختيار صلاحيه على الاقل ');
        //     return redirect()->route('role.index');
        // }
        $role = new Role();
        $role->name = $request->name;
        $role->permissions = json_encode($request->permissions);
        $role->save();

        toastr()->success('تم الحفظ بنجاح');
        return redirect()->route('role.index');
    }

    public function index(Request $request)
    {
        $roles = Role::all();
        foreach($roles as $role)
        {
            $role->permissions = $role->getPermissionAttribute($role->permissions);
        }
        return view('role.show',['roles'=>$roles]);
    }

    public function update(Request $request)
    {
        //dd($request);
        $role = Role::find($request->id);
        $role->name = $request->name;
        $role->permissions = json_encode($request->permissions);
        $role->save();

        toastr()->success('تم التعديل بنجاح');
        return redirect()->route('role.index');
    }

    public function delete(Request $request)
    {
        $t = Role::find($request->id);
        $t->delete();
        toastr()->error('تم الحذف بنجاح');
        return redirect()->route('role.index');
    }
}
