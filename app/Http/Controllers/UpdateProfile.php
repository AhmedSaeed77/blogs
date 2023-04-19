<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;
class UpdateProfile extends Controller
{

    public function showUpdateFormadmin()
    {
        $adminId = Auth::user()->id; 
        $admin = \App\Models\Admin::where('id',$adminId)->first();
        return view('admin.profile.admin-update',['admin'=>$admin]);
    }

    public function updateprofile1(Request $request)
    {
            //dd($request);
        
                //  $request->validate([
                    
                //      'name'=>'required',
                //      'whatsapp'=>'required',
                //      'phone'=>'required',
                //      'email'=>'required',
                //      'image'=>'required',
                //      'password'=>'required',
                //      'confirm'=>'required',
                //    ],[
                //       'name'=>' الاسم الاول مطلوب',
                //       'whatsapp'=>' الاسم الثانى مطلوب',
                //       'phone'=>' الهاتف مطلوب',
                //       'email'=>'الايميل مطلوب',
                //       'image'=>'صوره  البروفايل مطلوب  ', 
                //       'password'=>'الباسورد مطلوب ',
                //       'confirm'=>'الكونفيريم مطلوب ',
                //    ]);
          
                $user = \App\Models\Admin::find(Auth::user()->id);
                $user->name = $request->name;
                //$user->whatsapp = $request->whatsapp;
                $user->phone = $request->phone;
                $user->email = $request->email;

                if($request->password == $request->confirm)
                {
                    $user->password = Hash::make($request->password);
                }
                else
                {
                    return FacadesRedirect::back();
                }
                
                //  if($request->image)
                //  {
                //      if (File::exists('images/users/' .$user->image)) 
                //      {
                //          File::delete('images/users/'.$user->image);
                //      }
                //      $file = $request->image;
                //      $filename = $file->getClientOriginalName();
                //      $file->move('images/users',$filename);
                //      $user->image = $request->image;
                //  }
                $user->save();                
                return FacadesRedirect::route('admin.dashboard');
    }

    public function showUpdateForm()
    {

        $user = \App\Models\Auth\User::where('id',Auth::user()->id)->first();
        return view('auth.user-update',['user'=>$user]);
    }

    public function updateprofile(Request $request)
    {
        //dd($request);
        
                //  $request->validate([
                    
                //      'name'=>'required',
                //      'whatsapp'=>'required',
                //      'phone'=>'required',
                //      'email'=>'required',
                //      'image'=>'required',
                //      'password'=>'required',
                //      'confirm'=>'required',
                //    ],[
                //       'name'=>' الاسم الاول مطلوب',
                //       'whatsapp'=>' الاسم الثانى مطلوب',
                //       'phone'=>' الهاتف مطلوب',
                //       'email'=>'الايميل مطلوب',
                //       'image'=>'صوره  البروفايل مطلوب  ', 
                //       'password'=>'الباسورد مطلوب ',
                //       'confirm'=>'الكونفيريم مطلوب ',
                //    ]);
          
                $user = \App\Models\Auth\User::find(Auth::user()->id);
                $user->name = $request->name;
                //$user->whatsapp = $request->whatsapp;
                $user->phone = $request->phone;
                $user->email = $request->email;

                if($request->password == $request->confirm)
                {
                    $user->password = Hash::make($request->password);
                }
                else
                {
                    return FacadesRedirect::back();
                }
                
                //  if($request->image)
                //  {
                //      if (File::exists('images/users/' .$user->image)) 
                //      {
                //          File::delete('images/users/'.$user->image);
                //      }
                //      $file = $request->image;
                //      $filename = $file->getClientOriginalName();
                //      $file->move('images/users',$filename);
                //      $user->image = $request->image;
                //  }
                $user->save();                
                return FacadesRedirect::route('student.dashboard');
    
    }
}
