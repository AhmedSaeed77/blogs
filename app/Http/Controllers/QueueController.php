<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Jobs\SendMail;
use App\Models\User;

class QueueController extends Controller
{
    public function sendmail()
    {
        $data = User::chunk(3,function($data){
            dispatch(new SendMail($data));
        });
        toastr()->success('Will Send Emails');
        return redirect()->back();
    }
}
