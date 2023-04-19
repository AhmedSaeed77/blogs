<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        //$users = User::all();
        $users = Admin::latest()->where('id','<>',Auth::user()->id)->get();
        return view('user.show',['users'=>$users]);
    }

    public function store(Request $request)
    {
        
        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password == $request->confirm)
        {
            $user->password = Hash::make($request->password);
        }
        $user->role_id = $request->role_id;
        $user->save();

        toastr()->success('تم الحفظ بنجاح');
        return redirect()->route('users.index');
    }

    public function update(Request $request)
    {
        
        $user = Admin::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password)
        {
            if($request->password == $request->confirm)
            {
                $user->password = Hash::make($request->password);
            }
        }
        
        $user->role_id = $request->role_id;
        $user->save();

        toastr()->success('تم التعديل بنجاح');
        return redirect()->route('users.index');
    }
}
