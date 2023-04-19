<?php

namespace App\Http\Controllers;
//use Socialite;
use App\Models\User;
//use Auth;
use Illuminate\Support\Facades\Auth;

use Laravel\Socialite\Facades\Socialite;


use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        //return Socialite::driver($provider)->redirect();
        $link = Socialite::with($provider)->stateless()->redirect()->getTargetUrl();
        return response()->json(['link'=>$link],200);
    }

   
    //$userSocial =  Socialite::driver($provider)->user();

    public function Callback($provider){
        $userSocial =   Socialite::with($provider)->stateless()->user();
       
        $users       =   User::where(['email' => $userSocial->getEmail()])->first();
        //dd($provider);
        if($users)
        {
            //dd($userSocial);
            $token =  $users->createToken($userSocial->getEmail())->plainTextToken;
            $url = 'https://marsawaves.com/user/check/';
            return redirect($url.$token);
        }
        else
        {
            //dd($userSocial);
            if($provider == 'facebook')
            {
                return redirect('https://marsawaves.com');
            }
            $user = User::create([
                'fname'          => $userSocial->getName(),
                'lname'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'image'         => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
            ]);
            
            $token =  $user->createToken($userSocial->getEmail())->plainTextToken;
            $url = 'https://marsawaves.com/user/check/';
            return redirect($url.$token);
     
        }
    }
    public function checkSocial(Request $request)
    {
        $user = $request->user();
        
        if ($user) {
            $token =  $user->createToken('myapptoken')->plainTextToken;
            return response()->json(['Access-token' =>'bearer  '. $token]);
        }
        else{
            return  response()->json(['access-denied',403]);
        }

    }
}
