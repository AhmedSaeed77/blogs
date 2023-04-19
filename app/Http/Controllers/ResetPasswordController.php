<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Localization\Locale;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Password;
 use Illuminate\Support\Facades\DB;
 use Carbon\Carbon;
 use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    public function sendmail(Request $request)
    {
        $user = DB::table('users')->where('email', '=', $request->email)->first();
        //Check if the user exists
        if (!$user) 
        {
            return redirect()->back()->withErrors(['email' => 'User does not exist']);
        } 
        //Create Password Reset Token
        DB::table('password_resets')->insert([
                                                'email' => $request->email,
                                                'token' => str_random(60),
                                                'created_at' => Carbon::now()
                                            ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')->where('email', $request->email)->first();
        $link = env('APP_URL') . '/ppassword/resete?tok=' . $tokenData->token . '&email=' . urlencode($user->email);
        Mail::to($request->email)->send(new \App\Mail\resetemail($link));
        return redirect()->back()->with('success', 'A reset link has been sent to your email address');
        // return redirect()->back()->with('status' , 'A reset link has been sent to your email address.');
    }
    
    public function showResetForm(Request $request)
    {
        $token = $request->input('tok');
        $email = $request->input('email');
        
        $tokenData =  DB::table('password_resets')->where('token', $token)->whereRaw('MINUTE(created_at) < 60')->first();
        if(!$tokenData)
        {
            return view('auth.passwords.email')->withErrors(['email' => 'reset time out']);
        }
        return view('auth.passwords.change')->with(['token' => $token, 'email' => $email]);
    }
    
    public function changepass(Request $request)
    {        
        $password = $request->password;
        // Validate the token
        $tokenData = DB::table('password_resets')->where('token', $request->token)->first();        
        $tokenData =  DB::table('password_resets')->where('token', $request->token)->whereRaw('MINUTE(created_at) < 60')->first();
        // dd($tokenData);
        // Redirect the user back to the password reset request form if the token is invalid
        if($request->email !==  $tokenData->email) return view('auth.passwords.email');
        if (!$tokenData) return view('auth.passwords.email');
            
        $user = User::where('email', $tokenData->email)->first();
        // Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
        //Hash and update the new password
        $user->password = \Hash::make($password);
        $user->update(); //or $user->save();
        DB::table('password_resets')->where('email', $user->email)->delete();
        return redirect()->route('login'); 
    }    
}