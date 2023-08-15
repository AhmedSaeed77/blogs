<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        $data = [
            'subject' => 'Ahmed Saeed' ,
            'body' => 'Ahmed Saeed Body'
        ];

        try
        {
            Mail::to('ahmedsaeed1722@gmail.com')->send(new \App\Mail\MailNotificationGmail($data));
            return redirect()->back()->with('success', 'A reset link has been sent to your email address');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', 'A reset link has been not sent to your email address');
        }
        
    }
}
