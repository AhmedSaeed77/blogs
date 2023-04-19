<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'g-recaptcha-response' =>  function ($attribute, $value, $fail) 
            //                             {
            //                                 $secretkey = '6Lci90ckAAAAAJlEmC97Kw0igv3utIOl1vk2VIQN';
            //                                 $response = $value;
            //                                 $userIP = $_SERVER['REMOTE_ADDER'];
            //                                 $url = "URL: https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response&remoteip=$userIP";
            //                             }
                ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //dd($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    public function showLinkRequestForm()
    {
        return view('auth.reset');
    }


    public function sendmail(Request $request)
    {

        $user = DB::table('admins')->where('email', '=', $request->email)->first();
        //Check if the user exists
        if (!$user) 
        {
            return redirect()->back()->withErrors(['email' => 'User does not exist']);
        } 
        //Create Password Reset Token
        DB::table('password_resets')->insert([
                                                'email' => $request->email,
                                                'token' => Str::random(50),
                                                'flag' => 0,
                                                'created_at' => Carbon::now()
                                            ]);
                                            
        //Get the token just created above
        $tokenData = DB::table('password_resets')->where('email', $request->email)->where('flag',0)->first();
        $link = 'http://127.0.0.1:8000'. '/password/reset2?tok=' . $tokenData->token . '&email=' . urlencode($user->email);
        Mail::to($request->email)->send(new \App\Mail\ContactUsMail($link));
        return redirect()->back()->with('success', 'A reset link has been sent to your email address');

    }

    private function sendResetEmail2($email, $token)
    {
        //Retrieve the user from the database
        $user = DB::table('admins')->where('email', $email)->select('name', 'email')->first();
        //Generate, the password reset link. The token generated is embedded in the link
        $link = config('base_url') . 'password/reset/' . $token . '?email=' . urlencode($user->email);
        Mail::to($email)->send(new \App\Mail\ContactUsMail($link));
        try 
        {
        //Here send the link with CURL with an external email API 
            return true;
        } 
        catch (\Exception $e) 
        {
            return false;
        }
    }
    
    public function showResetForm2(Request $request)
    {
        //dd($request);
        $token = $request->input('tok');
        $email = $request->input('email');
        $tokenData =  DB::table('password_resets')->where('token', $token)->where('flag',0)->whereRaw('MINUTE(created_at) < 60')->first();
        //dd($tokenData);
        if(!$tokenData)
        {
            return view('auth.passwords.email-user')->withErrors(['email' => 'reset time out']);
        }
        return view('auth.passwords.change')->with(['token' => $token, 'email' => $email]);
    }
    
    public function changepass(Request $request)
    {        
        
        $password = $request->password;
        // Validate the token
        $tokenData = DB::table('password_resets')->where('token', $request->token)->where('flag',0)->first();        
        $tokenData = DB::table('password_resets')->where('token', $request->token)->where('flag',0)->whereRaw('MINUTE(created_at) < 60')->first();
        
        // Redirect the user back to the password reset request form if the token is invalid
        if($request->email !==  $tokenData->email) return view('auth.passwords.email');
        if (!$tokenData) return view('auth.passwords.email');
            
        $user = Admin::where('email', $tokenData->email)->first();
        // Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
        //Hash and update the new password
        if($request->password == $request->confirm)
        {
            $user->password = \Hash::make($password);
            $user->save();
        }
        else
        {
            return redirect()->back()->withErrors(['password' => 'password not confirm']);
        }
        
        DB::table('password_resets')->where('email', $user->email)->where('flag',0)->delete();
        return redirect()->route('login'); 
    }

    public function index()
    {
        $users = User::all();
        return view('user.show',['users'=>$users]);
    }
    
}
