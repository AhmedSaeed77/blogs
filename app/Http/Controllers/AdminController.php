<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;


class AdminController extends Controller
{
    public function logout()
    {
        auth()->guard('admin')->logout();
        toastr()->error('You are logged out');
        return redirect('check');
    }

    public function logoutuser()
    {
        auth()->guard('web')->logout();
        toastr()->error('You are logged out');
        return redirect('checkuser');
    }

    public function check()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        //dd($request);
        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])) 
        {
            toastr()->success('Welcome to the site');
            return redirect()->route('valex.index');
        } 
        else 
        {
            return redirect('check');
        }
    }

    public function checkuser()
    {
        return view('auth.loginuser');
    }

    public function checkuserlogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->guard('web')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) 
        {
            $agent = new Agent();
            $deviceType = $agent->deviceType();
            toastr()->success($deviceType.' Welcome to the site');
            return redirect('userpage');
        } 
        else 
        {
            return redirect('checkuser');
        }
    }

    public function registeruser()
    {
        return view('auth.registeruser');
    }

    public function storeuser(Request $request)
    {
        $user = new  User();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password == $request->confirm)
        {
            $user->password = Hash::make($request->password);
        }
        else
        {
            return redirect()->back();
        } 
        $user->save();
        return redirect('userpage');
    }

    public function store(Request $request)
    {
        $admin = new  Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->save();
    }

    public function index()
    {

        // return view('admin.type.index');
        //return view('admin.index');
    }
}
